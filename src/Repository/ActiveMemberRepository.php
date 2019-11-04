<?php

namespace App\Repository;

use App\Entity\ActiveMember;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ActiveMember|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActiveMember|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActiveMember[]    findAll()
 * @method ActiveMember[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiveMemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActiveMember::class);
    }

    // /**
    //  * @return ActiveMember[] Returns an array of ActiveMember objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActiveMember
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
