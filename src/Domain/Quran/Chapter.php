<?php

namespace App\Domain\Quran;

use App\Domain\Quran;
use App\Domain\Quran\Chapter\RevelationType;
use App\Domain\Quran\Chapter\Verse;

class Chapter
{
    private int $id;
    private int $name;
    private int $number;
    private string $englishName;
    private string $englishNameTranslation;
    private Verse $verses;
    private RevelationType $revelationType;
    private Quran $quran;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): int
    {
        return $this->name;
    }

    public function setName(int $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): self
    {
        $this->englishName = $englishName;

        return $this;
    }

    public function getEnglishNameTranslation(): string
    {
        return $this->englishNameTranslation;
    }

    public function setEnglishNameTranslation(string $englishNameTranslation): self
    {
        $this->englishNameTranslation = $englishNameTranslation;

        return $this;
    }

    public function getVerses(): Verse
    {
        return $this->verses;
    }

    public function setVerses(Verse $verses): self
    {
        $this->verses = $verses;

        return $this;
    }

    public function getRevelationType(): RevelationType
    {
        return $this->revelationType;
    }

    public function setRevelationType(RevelationType $revelationType): self
    {
        $this->revelationType = $revelationType;

        return $this;
    }
}
