<?php

namespace App\Repository;

use App\Entity\PartBrand;

use App\Repository\Interfaces\PartBrandRepositoryInterface;
use Symfony\Component\DependencyInjection\Attribute\When;


#[When(env: 'test')]
class PartBrandPDORepository implements PartBrandRepositoryInterface
{
    
    public function getBrand($brandId): PartBrand
    {
        return $this->find($brandId) ?? new PartBrand();
    }
    
    
    public function getBrands(): array
    {
        return $this->findAll();
    }
    
    
    public function storeBrand(PartBrand $brandObj): PartBrand 
    {
//        $this->_em->persist($brandObj);
//        $this->_em->flush();
        return $brandObj;
    }
    
    
    
    public function getBrandByName($name): PartBrand
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
