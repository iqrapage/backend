<?php

namespace App\Quran\Domain\Model\Chapter;

use App\Quran\Domain\Model\Chapter;
use App\Quran\Domain\Model\Language;

class Info
{
    private int $id;
    private string $text;
    private string $shortText;
    private string $source;
    private Language $language;
    private Chapter $chapter;

    /**
     * Info constructor
     *
     * @param string $text
     * @param string $shortText
     * @param Language $language
     * @param string $source
     * @param Chapter $chapter
     */
    public function __construct(string $text, string $shortText, string $source, Language $language, Chapter $chapter)
    {
        $this->text = $text;
        $this->shortText = $shortText;
        $this->source = $source;
        $this->language = $language;
        $this->chapter = $chapter;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getText(): ?string
    {
        return $this->text ?? null;
    }

    public function setText(string $text): Info
    {
        $this->text = $text;

        return $this;
    }

    public function getShortText(): ?string
    {
        return $this->shortText ?? null;
    }

    public function setShortText(string $shortText): Info
    {
        $this->shortText = $shortText;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language ?? null;
    }

    public function setLanguage(Language $language): Info
    {
        $this->language = $language;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source ?? null;
    }

    public function setSource(string $source): Info
    {
        $this->source = $source;

        return $this;
    }

    public function getChapter(): ?Chapter
    {
        return $this->chapter ?? null;
    }

    public function setChapter(Chapter $chapter): Info
    {
        $this->chapter = $chapter;

        return $this;
    }

}
