<?php

namespace App\Quran\Application\Service;

use App\Quran\Domain\Model\Chapter;
use App\Quran\Domain\Model\Chapter\Info;
use App\Quran\Domain\Repository\ChapterRepositoryInterface;
use App\Shared\Domain\ValueObject\Uuid;

class ChapterService
{
    private ChapterRepositoryInterface $chapterRepository;

    public function __construct(ChapterRepositoryInterface $chapterRepository)
    {
        $this->chapterRepository = $chapterRepository;
    }

    public function createChapter(
        Uuid $id,
        int $chapterNumber,
        string $revelationPlace,
        int $revelationOrder,
        bool $bismillahPre,
        string $nameSimple,
        string $nameComplex,
        string $nameArabic,
        int $versesCount,
        array $pages,
        Info $info
    ): Chapter {
        $chapter = Chapter::create(
            $id,
            $chapterNumber,
            $revelationPlace,
            $revelationOrder,
            $bismillahPre,
            $nameSimple,
            $nameComplex,
            $nameArabic,
            $versesCount,
            $pages,
            $info
        );
        $this->chapterRepository->add($chapter);

        return $chapter;
    }

    public function getByNameSimple(string $nameSimple)
    {
        return $this->chapterRepository->getByNameSimple($nameSimple);
    }

    public function getNextIdentity(): Uuid
    {
        return $this->chapterRepository->nextIdentity();
    }

    public function getVerseByVerseNumber(int $verseNumber)
    {
        return $this->chapterRepository->getVerseByVerseNumber($verseNumber);
    }

    public function getWordByVerseNumberAndWordPosition(int $verseNumber, int $wordPosition)
    {
        return $this->chapterRepository->getWordByVerseNumberAndWordPosition($verseNumber, $wordPosition);
    }
}
