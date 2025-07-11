<?php

namespace App\Controller;

use App\Service\TranslationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(TranslationService $translationService): Response
    {
        return $this->render('home/index.html.twig', [
            't' => $translationService->getAllTranslations(),
        ]);
    }
} 