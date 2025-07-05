<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(name: 'app:dokkan:fetch-units')]
class DokkanFetchCommand extends Command
{
    private HttpClientInterface $client;
    private Filesystem $filesystem;

    public function __construct(HttpClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
        $this->filesystem = new Filesystem();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $allUnits = [];
        $limit = 100;
        $offset = 0;
        $hasMore = true;

        $output->writeln('<comment>🔄 Récupération des unités depuis DokkanAPI...</comment>');

        while ($hasMore) {
            $query = <<<GRAPHQL
            {
                characters(limit: $limit, offset: $offset) {
                    id
                    name
                    title
                    type
                    rarity
                    categories
                }
            }
            GRAPHQL;

            $response = $this->client->request('POST', 'https://dokkanapi.azurewebsites.net/graphql', [
                'json' => ['query' => $query],
            ]);

            $data = $response->toArray();
            $characters = $data['data']['characters'];

            if (empty($characters)) {
                $hasMore = false;
            } else {
                foreach ($characters as $unit) {
                    $allUnits[] = [
                        'id' => $unit['id'],
                        'name' => $unit['name'],
                        'title' => $unit['title'],
                        'type' => $unit['type'],
                        'rarity' => $unit['rarity'],
                        'categories' => $unit['categories'],
                        'image' => "https://dokkan.fyi/assets/card/{$unit['id']}.png"
                    ];
                }

                $offset += $limit;
            }
        }

        $json = json_encode($allUnits, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $path = __DIR__ . '/../../public/data/units.json';

        $this->filesystem->dumpFile($path, $json);

        $output->writeln("<info>✅ " . count($allUnits) . " unités enregistrées dans public/data/units.json</info>");

        return Command::SUCCESS;
    }
}
