<?php

namespace App\Repository\Interfaces;
use App\Entity\PartsOffer;


interface PartsOfferRepositoryInterface
{

    public function getPartsOffer($offerId): ?PartsOffer;
    public function getBrands(): array;
    public function storePartsOffer(PartsOffer $partsOfferObj);
}
