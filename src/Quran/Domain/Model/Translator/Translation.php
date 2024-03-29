<?php

namespace App\Quran\Domain\Model\Translator;

use App\Quran\Domain\Model\Translator;
use App\Shared\Domain\Model\Language;

class Translation
{
    private int $id;
    private string $name;
    private Language $language;
    private Translator $translator;

    public function __construct(Translator $translator, Language $language, string $name)
    {
        $this->setTranslator($translator);
        $this->setlanguage($language);
        $this->setName($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function setLanguage(Language $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function setTranslator(Translator $translator): static
    {
        $this->translator = $translator;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Translation
    {
        $this->id = $id;

        return $this;
    }
}
