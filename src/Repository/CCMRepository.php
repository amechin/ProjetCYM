<?php

namespace App\Repository;

use App\Entity\CCM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CCM|null find($id, $lockMode = null, $lockVersion = null)
 * @method CCM|null findOneBy(array $criteria, array $orderBy = null)
 * @method CCM[]    findAll()
 * @method CCM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CCMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CCM::class);
    }

    // /**
    //  * @return CCM[] Returns an array of CCM objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CCM
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
