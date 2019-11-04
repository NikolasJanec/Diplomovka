<?php

namespace App\Repository;

use App\Entity\TypeLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLog[]    findAll()
 * @method TypeLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLog::class);
    }

    // /**
    //  * @return TypeLog[] Returns an array of TypeLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeLog
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
