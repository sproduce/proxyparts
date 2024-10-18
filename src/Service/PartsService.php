<?php

namespace App\Service;

use App\Entity\PartBrand;
use App\Entity\PartNumber;
use App\Entity\PartsOffer;

use App\Entity\User;



use App\Repository\Interfaces\PartBrandRepositoryInterface;
use App\Repository\Interfaces\PartNumberRepositoryInterface;
use App\Repository\Interfaces\PartsOfferRepositoryInterface;



class PartsService {
//    private $partBrandRep;
//    private $partNumberRep;
//    private $partsOfferRep;
    
    public function __construct(private PartBrandRepositoryInterface $partBrandRep, private PartNumberRepositoryInterface $partNumberRep, private PartsOfferRepositoryInterface $partsOfferRep)
    {
//        $this->partBrandRep = $partBrandRep;
//        $this->partNumberRep = $partNumberRep;
//        $this->partsOfferRep = $partsOfferRep;
    }
    
    
    
    
    private function clearNumberL($number)
    {
        return preg_replace("/[^a-z0-9 ]/","", trim(strtolower($number)));
    }
    
    
    
    public function getPartBrand($id): PartBrand
    {
       return $this->partBrandRep->getBrand($id) ?? new PartBrand();
    }
    
    
    public function getBrands(): ?array
    {
        return $this->partBrandRep->getBrands();
    }
    
    
    public function getParts(PartBrand $partBrand): ?array
    {
        return $this->partNumberRep->getParts($partBrand);
    }
    
    public function getPartNumber($id): PartNumber 
    {
        
        return $this->partNumberRep->getPart($id) ?? new PartNumber();
    }
    
    
    public function storePartNumber(PartNumber $partNumberObj) 
    {
        $this->partNumberRep->storePartNumber($partNumberObj);
    }
    
    
    public function storePartBrand(PartBrand $partBrandObj) 
    {
        $this->partBrandRep->storeBrand($partBrandObj);
    }
    
    
    public function getPartOffers($partObj)
    {
        
    }
    
    
    
    
    
    
    
    public function getUserOffers(User $userObj): array
    {
        return $this->partsOfferRep->getPartsOffers($userObj);
    }
    
    
    
    public function getUserOffer(User $userObj, $offerId = 0): PartsOffer
    {
        $offerObj = $this->partsOfferRep->getPartsOffer($offerId);
        if ($offerObj->getUserId() == $userObj->getId() || is_null($offerObj->getId())) {
            return $offerObj;
        }
        else {
            return $this->partsOfferRep->getPartsOffer(0);
        }
    }
    
    
    
    public function storeUserOffer(PartsOffer $partsOffer, User $userObj) 
    {
              
        
        
        
        
        $brandName = $partsOffer->getPart()->getPartBrand()->getName();
        
        $brandObj = $this->partBrandRep->getBrandByName($brandName);
        $partsOffer->getPart()->setPartBrand($brandObj);
        if (!$brandObj->getId()) {
            $brandObj = $this->partBrandRep->storeBrand($brandObj);
        }
        
                
        $partsOffer->getPart()->setPartBrand($brandObj);
        
        $partNumber = $partsOffer->getPart()->getNumberText();
        
        $partsOffer->setPart($this->partNumberRep->searchPart($partNumber, $brandObj));
        
        
        
        
        
        //$this->partBrandRep->storeBrand($partsOffer->getPart()->getPartBrand());
        

//        
//        $partNumber = $this->clearNumberL($partsOffer->getPart()->getNumber());
//        $partObj = $this->partNumberRep->searchPart($partNumber, $brandObj);
//        $partsOffer->setPart($partObj);
        
//        if (!$partsOffer->getPart()->getId()) {
//            $this->partBrandRep->storeBrand($partsOffer->getPart());
//        } 
//            
//        $offerPartObj->setPartBrand($brandObj);
//        $offerPartObj->setNumber($this->clearNumberL($offerPartObj->getNumberText()));
//        $partObj = $this->partNumberRep->searchPart($offerPartObj->getNumber(), $brandObj);
//        
//        if (!$partObj) {
//            $partObj = $this->partNumberRep->storePartNumber($offerPartObj);
//        }
//        
//        $partsOffer->setPart($partObj);
//        $partsOffer->setUser($userObj);
        
   //     $this->partsOfferRep->storePartsOffer($partsOffer);
        
    }
    
    
    
    
}
