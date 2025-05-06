<?php

namespace App\Repository\Interfaces;


use App\Entity\PartNumber;
use App\Entity\PartBrand;

interface PartNumberRepositoryInterface {
    
    
    public function storePartNumber(PartNumber $partNumberObj): PartNumber;
    public function getPart($partId): ?PartNumber;
    public function getParts(PartBrand $brandObj): array;
    public function searchParts($number);
    public function searchPart($number, PartBrand $brandObj): PartNumber;
    
}
