<?php

namespace App\Repository;

use App\Entity\PartBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartBrand>
 *
 * @method PartBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartBrand[]    findAll()
 * @method PartBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartBrandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartBrand::class);
    }

    //    /**
    //     * @return PartBrand[] Returns an array of PartBrand objects
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

    //    public function findOneBySomeField($value): ?PartBrand
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
