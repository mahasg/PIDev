<?php

namespace App\Repository;

use App\Entity\Reclike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reclike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclike[]    findAll()
 * @method Reclike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclike::class);
    }

    // /**
    //  * @return Reclike[] Returns an array of Reclike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reclike
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
