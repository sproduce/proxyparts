<?php

namespace App\Repository;

use App\Entity\PartNumber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\Interfaces\PartNumberRepositoryInterface;

/**
 * @extends ServiceEntityRepository<PartNumber>
 *
 * @method PartNumber|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartNumber|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartNumber[]    findAll()
 * @method PartNumber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartNumberRepository extends ServiceEntityRepository implements PartNumberRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartNumber::class);
    }

    
    
    public function storePartNumber(PartNumber $partNumberObj) 
    {
         $this->_em->persist($partNumberObj);
         
         $this->_em->flush();
    }
    
    
    public function getPart($partId): ?PartNumber 
    {
        return $this->find($partId);
    }
    
    
    public function searchParts($number) 
    {
        
    }
    
    
    public function searchPart($number, $brandId): PartNumber
    {
        
    }
    
    
    
//    /**
//     * @return PartNumber[] Returns an array of PartNumber objects
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

//    public function findOneBySomeField($value): ?PartNumber
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
