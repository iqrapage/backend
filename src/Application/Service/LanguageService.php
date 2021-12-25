<?php

namespace App\Application\Service;

use App\Domain\Model\Language;
use App\Domain\Repository\LanguageRepositoryInterface;

class LanguageService
{
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function createLanguage(string $name, string $nativeName, string $isoCode, string $direction): Language
    {
        $language = Language::create($name, $nativeName, $isoCode, $direction);
        $this->languageRepository->add($language);

        return $language;
    }

    public function getByIsoCode(string $isoCode)
    {
        return $this->languageRepository->getByIsoCode($isoCode);
    }
}
