<?php

namespace App\Repository;

use App\Entity\Seed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Seed|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seed|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seed[]    findAll()
 * @method Seed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seed::class);
    }

    // /**
    //  * @return Seed[] Returns an array of Seed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Seed
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
