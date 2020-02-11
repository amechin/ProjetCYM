<?php

namespace App\Repository;

use App\Entity\Carte;
use App\Entity\Categorie;
use App\Entity\Correspondance;
use App\Entity\Duree;
use App\Entity\Groupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Correspondance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Correspondance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Correspondance[]    findAll()
 * @method Correspondance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrespondanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Correspondance::class);
    }

    public function findByCartes($duree, $groupe, $categorie)
    {
        return $this->createQueryBuilder('c')
            ->Select('a.id, a.nom')
            ->leftJoin(Carte::class, 'a', 'WITH', 'c.carte = a.id')
            ->andWhere('c.categorie = :cat')
            ->andWhere('c.duree = :duree')
            ->andWhere('c.groupe = :groupe')
            ->setParameter('cat', $categorie)
            ->setParameter('duree', $duree)
            ->setParameter('groupe', $groupe)
            ->getQuery()
            ->getResult()
            ;
    }


    public function findByExercices($duree, $groupe, $categorie, $carte)
    {
        return $this->createQueryBuilder('c')
            ->Select('c.exercice_id')
            ->andWhere('c.categorie = :cat')
            ->andWhere('c.duree = :duree')
            ->andWhere('c.groupe = :groupe')
            ->andWhere('c.carte = :carte')
            ->setParameter('cat', $categorie)
            ->setParameter('duree', $duree)
            ->setParameter('groupe', $groupe)
            ->setParameter('carte', $carte)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findAllCorrespondance()
    {
        return $this->createQueryBuilder('c')
            ->Select('d.duree, g.groupe, cg.nom, ct.carte, c.exercice_id')
            ->join(Duree::class, 'd', 'WITH', 'c.duree = d.id')
            ->Join(Groupe::class, 'g', 'WITH', 'c.groupe = g.id')
            ->Join(Categorie::class, 'cg', 'WITH', 'c.categorie = cg.id')
            ->Join(Carte::class, 'ct', 'WITH', 'c.carte = ct.id')
            ->getQuery()
            ->getResult()
            ;
    }


    // /**
    //  * @return Correspondance[] Returns an array of Correspondance objects
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
    public function findOneBySomeField($value): ?Correspondance
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
