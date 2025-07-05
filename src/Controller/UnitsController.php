<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UnitsController extends AbstractController
{
    #[Route('/units', name: 'units_list')]
    public function list(Request $request)
    {
        // Déterminer la langue à utiliser
        $locale = $request->getSession()->get('locale', 'fr');
        $jsonFile = $locale === 'en' ? 'units.json' : 'units_fr.json';
        
        $units = json_decode(file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/' . $jsonFile), true);

        $search = $request->query->get('search', '');
        $filterRarity = $request->query->get('rarity', '');
        $filterType = $request->query->get('type', '');
        $sort = $request->query->get('sort', '');

        $units = array_filter($units, function($unit) use ($search, $filterRarity, $filterType) {
            $match = true;
            if ($search) {
                $match = $match && stripos($unit['name'], $search) !== false;
            }
            if ($filterRarity) {
                $match = $match && (isset($unit['rarity']) && $unit['rarity'] === $filterRarity);
            }
            if ($filterType) {
                $match = $match && (isset($unit['type']) && $unit['type'] === $filterType);
            }
            return $match;
        });

        if ($sort === 'name') {
            usort($units, fn($a, $b) => strcmp($a['name'] ?? '', $b['name'] ?? ''));
        } elseif ($sort === 'rarity') {
            usort($units, fn($a, $b) => strcmp($a['rarity'] ?? '', $b['rarity'] ?? ''));
        }

        return $this->render('units/list.html.twig', [
            'units' => $units,
            'search' => $search,
            'filterRarity' => $filterRarity,
            'filterType' => $filterType,
            'sort' => $sort,
        ]);
    }

    #[Route('/unit/{id}', name: 'unit_show')]
public function show(string $id, Request $request): Response
{
    // Déterminer la langue à utiliser
    $locale = $request->getSession()->get('locale', 'fr');
    $jsonFile = $locale === 'en' ? 'units.json' : 'units_fr.json';
    
    $units = json_decode(file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/' . $jsonFile), true);

    // Recherche de l'unité par id
    $unit = null;
    foreach ($units as $u) {
        if ((string)$u['id'] === $id) {
            $unit = $u;
            break;
        }
    }

    if (!$unit) {
        throw $this->createNotFoundException("Personnage introuvable");
    }

    return $this->render('units/show.html.twig', [
        'unit' => $unit,
    ]);
}
}
