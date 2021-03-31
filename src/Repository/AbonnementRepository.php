<?php

namespace App\Repository;

use App\Entity\Abonnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Abonnement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abonnement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abonnement[]    findAll()
 * @method Abonnement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbonnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abonnement::class);
    }


    public function getNbValide()
    {
        $now = new \DateTime();
        $nowwmintwo = new \DateTime();

        $nowwmintwo->modify('-2 days');

        $qb = $this->createQueryBuilder('abonnement');
        $qb->select('Sum(abonnement.valide) as valide
        
        
        ')
            ->andWhere('abonnement.datedemande Between :nowmintwo  AND :now')
            ->setParameter('now', $now)
            ->setParameter('nowmintwo', $nowwmintwo)
        ;
        $result = $qb->getQuery()->getSingleScalarResult();

        return $result;
    }
    // /**
    //  * @return Abonnement[] Returns an array of Abonnement objects
    //  */

    public function getNbEnAttente()
    {
        $now = new \DateTime();
        $nowwmintwo = new \DateTime();

        $nowwmintwo->modify('-2 days');

        $qb = $this->createQueryBuilder('abonnement');
        $qb->select('
        COUNT(abonnement)-Sum(abonnement.valide) as enattente
        
        ')
            ->andWhere('abonnement.datedemande Between :nowmintwo  AND :now')
            ->setParameter('now', $now)
            ->setParameter('nowmintwo', $nowwmintwo)
        ;
        $result = $qb->getQuery()->getSingleScalarResult();

        return $result;
    }
    public function getabolasttwodays()
    {
        $now = new \DateTime();
        $nowwmintwo = new \DateTime();

        $nowwmintwo->modify('-2 days');
        return $this->createQueryBuilder('abonnement')
            ->andWhere('abonnement.datedemande Between :nowmintwo  AND :now')
            ->setParameter('now', $now)
            ->setParameter('nowmintwo', $nowwmintwo)
            ->orderBy('abonnement.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Abonnement[] Returns an array of Abonnement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abonnement
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
