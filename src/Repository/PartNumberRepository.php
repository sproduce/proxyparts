<?php

namespace App\Repository;

use App\Entity\PartNumber;
use App\Entity\PartBrand;

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

    
    
    public function storePartNumber(PartNumber $partNumberObj): PartNumber
    {
         $this->_em->persist($partNumberObj);
         $this->_em->flush();
         return $partNumberObj;
    }
    
    
    public function getPart($partId): ?PartNumber 
    {
        return $this->find($partId);
    }
    
    
    public function getParts(PartBrand $brandObj): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery('
            select part from App\Entity\PartNumber part
            where part.partBrand = :brandObj'
                )->setParameter('brandObj', $brandObj);
        return $query->getResult();
    }
    
    
    
    
    public function searchParts($number) 
    {
         return $this->createQueryBuilder('partNumber')
            ->andWhere('partNumber.number = :number')
            ->setParameter('number', $number)
            ->getQuery()
            ->getResult()
        ;
    }
    
    
    public function searchPart($number, PartBrand $brandObj): PartNumber
    {
        $query = $this->_em->createQuery('
            select part from App\Entity\PartNumber part
            where part.partBrand = :brandObj and part.number = :number'
                )->setParameter('brandObj', $brandObj)
                ->setParameter('number', $number);
        $partNumber = $query->getOneOrNullResult();
        if (is_null($partNumber)){
            $partNumber = new PartNumber();
            $partNumber->setNumber($number);
            $partNumber->setPartBrand($brandObj);
        }

        return $partNumber;
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
