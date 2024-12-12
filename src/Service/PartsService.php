<?php

namespace App\Service;

use App\Entity\PartBrand;
use App\Entity\PartNumber;
use App\Entity\PartsOffer;

use App\Entity\User;



use App\Repository\Interfaces\PartBrandRepositoryInterface;
use App\Repository\Interfaces\PartNumberRepositoryInterface;
use App\Repository\Interfaces\PartsOfferRepositoryInterface;
use App\Repository\Interfaces\OfferPropertyRepositoryInterface;



class PartsService {
    
    public function __construct(private PartBrandRepositoryInterface $partBrandRep, 
            private PartNumberRepositoryInterface $partNumberRep, 
            private PartsOfferRepositoryInterface $partsOfferRep,
            private OfferPropertyRepositoryInterface $offerPropertyRep,
    ){

    }
    
    
    
    
    private function clearNumberL($number)
    {
        return preg_replace("/[^a-z0-9]/","", trim(strtolower($number)));
    }
    
    
    
    
    
    public function getOfferPropertys() 
    {
        return $this->offerPropertyRep->getOfferPropertys();
    }
    
    
    
    public function getPartBrand($id): PartBrand
    {
       return $this->partBrandRep->getBrand($id) ?? new PartBrand();
    }
    
    public function getBrandByName($brandName): PartBrand
    {
        $brandObj = $this->partBrandRep->getBrandByName($brandName);
        if (is_null($brandObj->getId())){
            $brandObj = $this->partBrandRep->storeBrand($brandObj);
        }
        return $brandObj;
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
    
    
    public function getPartByNumber($partNumber, PartBrand $brandObj, $info): PartNumber
    {
        $partNumberClear = $this->clearNumberL($partNumber);
        
        $partObj = $this->partNumberRep->searchPart($partNumberClear, $brandObj);
        if (is_null($partObj->getId())){
            $partObj->setNumberText($partNumber);
            $partObj->setInfo($info);
            $partObj = $this->partNumberRep->storePartNumber($partObj);
        }
        return $partObj;
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
    
    
    
    
    public function storeUserOffer(PartsOffer $partsOfferForm, User $userObj) 
    {
        $partsOffer = $this->partsOfferRep->getPartsOffer($partsOfferForm->getId());
        
        $partsOffer->setUser($userObj);
        $partsOffer->setProperty($partsOfferForm->getProperty());
        $partsOffer->setAmount($partsOfferForm->getAmount());
        $partsOffer->setComment($partsOfferForm->getComment());
        $partsOffer->setPrice($partsOfferForm->getPrice());
        $partsOffer->setPriceSale($partsOfferForm->getPriceSale());
        $partsOffer->setPublic($partsOfferForm->getPublic());

        $brandName = $partsOfferForm->getPart()->getPartBrand()->getName();
        $brandObj = $this->getBrandByName($brandName);
        $partsOffer->getPart()->setPartBrand($brandObj);
                
        $partNumber = $partsOfferForm->getPart()->getNumberText();
        $partObj = $this->getPartByNumber($partNumber, $brandObj, $partsOfferForm->getPart()->getInfo());
        $partsOffer->setPart($partObj);
        
        $this->partsOfferRep->storePartsOffer($partsOffer);
              
    }
    
    
    
    
}
