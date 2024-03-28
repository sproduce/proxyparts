<?php

namespace App\Service;

use App\Entity\PartBrand;
use App\Entity\PartNumber;

use App\Repository\Interfaces\PartBrandRepositoryInterface;
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
    
    
    public function storePartBrand(PartBrand $partBrandObj) 
    {
        $this->partBrandRep->storeBrand($$partBrandObj);
    }
    
    
    
    
}
