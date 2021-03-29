<?php

namespace App\Repository;

use App\Entity\Equipement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipement[]    findAll()
 * @method Equipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipement::class);
    }
    public function affichernumsalle(int $productId): ?Product
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p, c
            FROM App\Entity\Equipement p
            INNER JOIN p.cinema c
            WHERE p.id = :id'
        )->setParameter('id', $productId);

        return $query->getOneOrNullResult();
    }

    public function findMinMax(Equipement $search): array
    {
        $results = $this->getSearchQuery($search, true)
            ->select('MAX(p.prix) as max')
            ->getQuery()
            ->getScalarResult();
        return [(float)$results[0]['max']];
    }

    public function findequipement(Equipement $search){


        return $this->createQueryBuilder('equipement')
            ->Where('equipement.prix < :search')
            ->setParameter('search', $search->getPrix())
            ->getQuery()
            ->getResult();
    }
    public function OrderByNOM()
    {
        return $this->createQueryBuilder('equipement')
            ->orderBy('equipement.nome','ASC')
            ->getQuery()
            ->getResult();
    }
    public function findItemsCreatedBetweenTwoDates(float $beginprix,float $endprix)
    {
        return $this->createQueryBuilder('r')
            ->where("r.prix >= ?1")
            ->andWhere("r.prix <= ?2")
            ->setParameter(1, $beginprix)
            ->setParameter(2, $endprix)
            ->getQuery()
            ->getResult();
    }


    // /**
    //  * @return Equipement[] Returns an array of Equipement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Equipement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


}
