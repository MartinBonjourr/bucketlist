<?php

namespace App\Repository;

use App\Entity\Wish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wish[]    findAll()
 * @method Wish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wish::class);
    }

   public function findRecent()
   {
       /* //en DQL
       $entityManager = $this->getEntityManager();
       $dql = "SELECT w 
               FROM App\Entity\Wish w
               ORDER BY w.dateCreated DESC 
                ";
       $query = $entityManager->createQuery($dql);
       $query->setMaxResults(50);
       $result = $query->getResult();

       return $result;*/

       //version QueryBuilder
       $queryBuilder = $this->createQueryBuilder('w');
       $queryBuilder->addOrderBy('w.dateCreated', 'DESC');
       $query = $queryBuilder->getQuery();

       $result = $query->getResult();

       return $result;

   }
}
