<?php

namespace App\Repository;

use App\Entity\PartsOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartsOffer>
 *
 * @method PartsOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartsOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartsOffer[]    findAll()
 * @method PartsOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartsOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartsOffer::class);
    }

//    /**
//     * @return PartsOffer[] Returns an array of PartsOffer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PartsOffer
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
