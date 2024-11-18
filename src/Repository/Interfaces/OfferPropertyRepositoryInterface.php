<?php

namespace App\Repository\Interfaces;
use App\Entity\OfferProperty;



interface OfferPropertyRepositoryInterface
{

    public function getOfferProperty($propertyId): OfferProperty;
    public function getOfferPropertys();
    public function storeOfferProperty(OfferProperty $OfferPropertyObj): OfferProperty;
}
