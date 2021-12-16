<?php

namespace App\Domain\Repository;

use App\Domain\Quran;

interface QuranRepositoryInterface
{
    public function get(Quran $quran);

    public function store(Quran $quran);
}