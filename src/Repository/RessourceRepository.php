<?php

namespace App\Repository;

use App\Entity\Ressource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @method Ressource|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ressource|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ressource[]    findAll()
 * @method Ressource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RessourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ressource::class);
    }

    public function findAllDesignDateDesc()
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.id', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findHighestDesignId(): int
    {
        $data = $this->createQueryBuilder('r')
            ->select('MAX(r.designId)')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        foreach ($data as $value) {
            foreach ($value as $val) {
                $uniqDesignId = $val;
            }
        }
        return isset($uniqDesignId) ? (int)$uniqDesignId : 0;
    }

    // /**
    //  * @return Ressource[] Returns an array of Ressource objects
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
    public function findOneBySomeField($value): ?Ressource
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
