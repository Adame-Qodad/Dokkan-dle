<?php

namespace App\EventListener;

use App\Service\TranslationService;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TranslationListener implements EventSubscriberInterface
{
    private $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();
        
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        // Vérifier si le contrôleur a une méthode render
        if (method_exists($controller, 'render')) {
            // Injecter les traductions dans la requête pour qu'elles soient disponibles dans les templates
            $request = $event->getRequest();
            $request->attributes->set('translations', $this->translationService->getAllTranslations());
        }
    }
} 