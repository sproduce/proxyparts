<?php

namespace App\Repository;

use App\Entity\PartBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\Interfaces\PartBrandRepositoryInterface;

/**
 * @extends ServiceEntityRepository<PartBrand>
 *
 * @method PartBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartBrand[]    findAll()
 * @method PartBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartBrandDoctrineRepository extends ServiceEntityRepository implements PartBrandRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartBrand::class);
    }
    
    public function getBrand($brandId): ?PartBrand
    {
        return $this->find($brandId);
    }
    
    
    public function getBrands(): array
    {
        return $this->findAll();
    }
    
    
    public function storeBrand(PartBrand $brandObj) 
    {
        $this->_em->persist($brandObj);
        $this->_em->flush();
    }
    
    
    
    public function getBrandByName($name): ?PartBrand
    {
        return $this->findOneBy(['name' => $name]);
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
