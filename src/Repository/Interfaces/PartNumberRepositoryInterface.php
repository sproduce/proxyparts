<?php

namespace App\Repository\Interfaces;


use App\Entity\PartNumber;


interface PartNumberRepositoryInterface {
    
    
    public function storePartNumber(PartNumber $partNumberObj);
    public function getPart($partId): ?PartNumber;
    
    
}
