<?php

namespace App\Repository;

use App\Entity\SalesInno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SalesInno|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalesInno|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalesInno[]    findAll()
 * @method SalesInno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalesInnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalesInno::class);
    }

    // /**
    //  * @return SalesInno[] Returns an array of SalesInno objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SalesInno
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
