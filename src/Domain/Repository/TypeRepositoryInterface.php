<?php

namespace App\Domain\Repository;

use App\Domain\Quran\Type;

interface TypeRepositoryInterface
{
    public function getById(int $id);

    public function add(Type $type);

    public function getOneByName(string $name);
}
