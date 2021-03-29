<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\Type;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints\Date;
use \Doctrine\DBAL\Types\DateTimeType;
/**
 * @method Reclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclamation[]    findAll()
 * @method Reclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
       parent::__construct($registry, Reclamation::class);
    }

   public function findStudentByfield($field){
       return $this->createQueryBuilder('reclamation')
               ->Where('reclamation.field LIKE :field')
               ->setParameter('field', '%'.$field.'%')
               ->getQuery()
               ->getResult();
    }

    public function OrderByDateQB()
    {
        return $this->createQueryBuilder('reclamation')
            ->orderBy('reclamation.datee','ASC')
            ->getQuery()
            ->getResult();
    }
    public function findItemsCreatedBetweenTwoDates(\DateTime $beginDate, \DateTime $endDate)
    {
        return $this->createQueryBuilder('r')
            ->where("r.datee >= ?1")
            ->andWhere("r.datee <= ?2")
            ->setParameter(1, $beginDate)
            ->setParameter(2, $endDate)
            ->getQuery()
            ->getResult();
    }
    public function getNB()
    {

        $qb = $this->createQueryBuilder('v')
            ->select('COUNT(v.idrec) AS vid, SUBSTRING(v.datee, 1, 10) AS date')
            ->groupBy('date');
        return $qb->getQuery()
            ->getResult();

    }

    // /**
    //  * @return Reclamation[] Returns an array of Reclamation objects
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
    public function findOneBySomeField($value): ?Reclamation
    {

         $postID = 1; // It will be changed with dynamic value

       // Fetch the post and rating info from database
        $query = "SELECT p.*, COUNT(r.rating_number) as rating_num, FORMAT((SUM(r.rating_number) / COUNT(r.rating_number)),1) as average_rating FROM posts as p LEFT JOIN rating as r ON r.post_id = p.id WHERE p.id = $postID GROUP BY (r.post_id)";
        $result = $db->query($query);
        $reclamation = $result->fetch_assoc();
    }
    */
}
