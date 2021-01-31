<?php

namespace App\Repository;

use App\Entity\ListeValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeValeur[]    findAll()
 * @method ListeValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeValeur::class);
    }

    // /**
    //  * @return ListeValeur[] Returns an array of ListeValeur objects
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
    public function findOneBySomeField($value): ?ListeValeur
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
