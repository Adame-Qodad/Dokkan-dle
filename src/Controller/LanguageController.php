<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/language/{locale}', name: 'change_language')]
    public function changeLanguage(string $locale, Request $request): Response
    {
        // Valider que la langue est supportée
        $supportedLocales = ['fr', 'en'];
        if (!in_array($locale, $supportedLocales)) {
            $locale = 'fr'; // Langue par défaut
        }

        // Stocker la langue dans la session
        $request->getSession()->set('locale', $locale);

        // Rediriger vers la page précédente ou l'accueil
        $referer = $request->headers->get('referer');
        if ($referer) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('home');
    }
} 