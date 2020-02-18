<?php

namespace App\Repository;

use App\Entity\Duree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Duree|null find($id, $lockMode = null, $lockVersion = null)
 * @method Duree|null findOneBy(array $criteria, array $orderBy = null)
 * @method Duree[]    findAll()
 * @method Duree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DureeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Duree::class);
    }

    // /**
    //  * @return Duree[] Returns an array of Duree objects
    //  */

    public function findAllSortAsc()
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.duree', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Duree
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
