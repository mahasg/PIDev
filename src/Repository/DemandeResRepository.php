<?php

namespace App\Repository;

use App\Entity\DemandeRes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeRes|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeRes|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeRes[]    findAll()
 * @method DemandeRes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeResRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeRes::class);
    }

    // /**
    //  * @return DemandeRes[] Returns an array of DemandeRes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandeRes
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
