<?php

namespace App\Service;

use App\Entity\PartBrand;
use App\Entity\PartNumber;

use App\Repository\Interfaces\PartBrandRepositoryInterface;
use App\Repository\PartBrandRepository;


use App\Repository\Interfaces\PartNumberRepositoryInterface;



class PartsService {
    private $partBrandRep;
    private $partNumberRep;
    
    public function __construct(PartBrandRepositoryInterface $partBrand, PartNumberRepositoryInterface $partNumber)
    {
        $this->partBrandRep = $partBrand;
        $this->partNumberRep = $partNumber;
    }
    
    public function getPartBrand($id): PartBrand
    {
//        $name = 'test11';
//        
//        $partBrandObj = $this->partBrandRep->getBrandByName($name);
//        if (!$partBrandObj){
//            $partBrandObj = new PartBrand();
//            $partBrandObj->setName($name);
//        }

        //$this->partBrandRep->storeBrand($partBrandObj);
        
       return $this->partBrandRep->getBrand($id) ?? new PartBrand();
    }
    
    
    public function getPartNumber($id) 
    {
        
        return $this->partNumberRep->getPart($id) ?? new PartNumber();
    }
    
    
    
    
    
    public function storePartNumber(PartNumber $partNumberObj) 
    {
        $this->partNumberRep->storePartNumber($partNumberObj);
    }
    
    
}
