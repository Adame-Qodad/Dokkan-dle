<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\KernelInterface;

#[AsCommand(name: 'app:download-unit-images')]
class DownloadUnitImagesCommand extends Command
{
    private HttpClientInterface $client;
    private Filesystem $filesystem;
    private string $projectDir;

    public function __construct(HttpClientInterface $client, KernelInterface $kernel)
    {
        parent::__construct();
        $this->client = $client;
        $this->filesystem = new Filesystem();
        $this->projectDir = $kernel->getProjectDir();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $jsonPath = $this->projectDir . '/public/data/units.json';
        if (!file_exists($jsonPath)) {
            $output->writeln('<error>Fichier units.json introuvable.</error>');
            return Command::FAILURE;
        }

        $units = json_decode(file_get_contents($jsonPath), true);
        if (!$units) {
            $output->writeln('<error>Impossible de décoder units.json.</error>');
            return Command::FAILURE;
        }

        $imagesDir = $this->projectDir . '/public/images/units';
        if (!$this->filesystem->exists($imagesDir)) {
            $this->filesystem->mkdir($imagesDir);
            $output->writeln("<info>Dossier $imagesDir créé.</info>");
        }

        foreach ($units as &$unit) {
            if (empty($unit['imageURL'])) {
                $output->writeln("<comment>Unité {$unit['name']} sans imageURL, skip.</comment>");
                continue;
            }

            $url = $unit['imageURL'];
            $safeName = preg_replace('/[^a-z0-9]+/i', '_', strtolower($unit['name']));
            $filename = "{$unit['id']}_{$safeName}.png";
            $filepath = $imagesDir . '/' . $filename;

            try {
                $response = $this->client->request('GET', $url);
                if ($response->getStatusCode() !== 200) {
                    $output->writeln("<error>Erreur HTTP {$response->getStatusCode()} pour {$unit['name']}.</error>");
                    continue;
                }

                $content = $response->getContent();
                file_put_contents($filepath, $content);

                $unit['localImagePath'] = '/images/units/' . $filename;
                $output->writeln("<info>Téléchargé {$unit['name']} → $filename</info>");
            } catch (\Exception $e) {
                $output->writeln("<error>Erreur pour {$unit['name']}: {$e->getMessage()}</error>");
            }
        }

        // (Optionnel) sauvegarder JSON mis à jour avec les chemins locaux
        file_put_contents($jsonPath, json_encode($units, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $output->writeln('<info>Téléchargement terminé, JSON mis à jour.</info>');

        return Command::SUCCESS;
    }
}
