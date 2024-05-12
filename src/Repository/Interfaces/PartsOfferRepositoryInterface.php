<?php

namespace App\Repository\Interfaces;
use App\Entity\PartsOffer;
use App\Entity\User;


interface PartsOfferRepositoryInterface
{

    public function getPartsOffer($offerId): PartsOffer;
    public function storePartsOffer(PartsOffer $partsOfferObj): PartsOffer;
    public function getPartsOffers(User $userObj): array;
}
