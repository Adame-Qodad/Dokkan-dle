<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class TranslationService
{
    private $requestStack;
    private $translations;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->translations = require __DIR__ . '/../../config/translations.php';
    }

    public function getLocale(): string
    {
        return $this->requestStack->getSession()->get('locale', 'fr');
    }

    public function trans(string $key): string
    {
        $locale = $this->getLocale();
        return $this->translations[$locale][$key] ?? $key;
    }

    public function getAllTranslations(): array
    {
        $locale = $this->getLocale();
        return $this->translations[$locale] ?? [];
    }
} 