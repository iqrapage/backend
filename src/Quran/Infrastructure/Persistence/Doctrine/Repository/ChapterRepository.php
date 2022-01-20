<?php

namespace App\Quran\Infrastructure\Persistence\Doctrine\Repository;

use App\Quran\Domain\Model\Chapter;
use App\Quran\Domain\Repository\ChapterRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ChapterRepository extends ServiceEntityRepository implements ChapterRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chapter::class);
    }

    public function add(Chapter $chapter)
    {
        $this->getEntityManager()->persist($chapter);
        $this->getEntityManager()->flush();
    }

    public function getByNameSimple(string $nameSimple)
    {
        return $this->findOneBy(['nameSimple' => $nameSimple]);
    }
}
