<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UnitController extends AbstractController
{
    #[Route('/unit-of-the-day', name: 'unit_of_the_day')]
    public function show(Request $request): Response
    {
        // Déterminer la langue à utiliser
        $locale = $request->getSession()->get('locale', 'fr');
        $jsonFile = $locale === 'en' ? 'units.json' : 'units_fr.json';
        
        $units = json_decode(file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/' . $jsonFile), true);

        // Choisir une unité aléatoire
        $unit = $units[array_rand($units)];

        return $this->render('units/show.html.twig', [
            'unit' => $unit,
        ]);
    }
}
