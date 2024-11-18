<?php

namespace App\Repository;

use App\Entity\OfferProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\Interfaces\OfferPropertyRepositoryInterface;


/**
 * @extends ServiceEntityRepository<OfferProperty>
 *
 * @method OfferProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfferProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfferProperty[]    findAll()
 * @method OfferProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferPropertyRepository extends ServiceEntityRepository implements OfferPropertyRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfferProperty::class);
    }

    //    /**
    //     * @return OfferProperty[] Returns an array of OfferProperty objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OfferProperty
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    
    
    public function getOfferProperty($propertyId): OfferProperty
    {
        
    }
    
    
    
    public function getOfferPropertys() 
    {
        return $this->findAll();
    }
    
    
    public function storeOfferProperty(OfferProperty $OfferPropertyObj): OfferProperty
    {
        
    }
    
    
    
    
}
