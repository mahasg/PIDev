<?php

namespace App\Repository;

use App\Entity\TypeAbonnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeAbonnement|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAbonnement|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAbonnement[]    findAll()
 * @method TypeAbonnement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAbonnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAbonnement::class);
    }

    public function  find_places(){



       return $this->getEntityManager()->createQueryBuilder()
            ->select('ta.id,ta.type,ta.prix,ta.description,ta.image,
            ta.placesdispo-COALESCE( sum(ab.valide),0) placesdispo ' )

            ->from('App:TypeAbonnement', 'ta')
            // Get raw subquery SQL and wrap in brackets.
         ->leftjoin('App:Abonnement','ab',\Doctrine\ORM\Query\Expr\Join::WITH,'ta.id=ab.typeabonnement')

          ->groupBy('ta.id')
           ->orderBy('ta.id','DESC')->getQuery()->getResult();











          /*   $qb = $this->getEntityManager()->createQueryBuilder();
        $qb
            ->select('ta.id,ta.type,ta.prix,ta.description,ta.image,ta.placesdispo')
            -> from('App:TypeAbonnement','ta');*/




    }

    // /**
    //  * @return TypeAbonnement[] Returns an array of TypeAbonnement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAbonnement
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
