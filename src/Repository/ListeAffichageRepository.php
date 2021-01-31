<?php

namespace App\Repository;

use App\Entity\ListeAffichage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeAffichage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeAffichage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeAffichage[]    findAll()
 * @method ListeAffichage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeAffichageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeAffichage::class);
    }

    // /**
    //  * @return ListeAffichage[] Returns an array of ListeAffichage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeAffichage
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
