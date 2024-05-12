<?php

namespace App\Repository\Interfaces;
use App\Entity\PartBrand;


interface PartBrandRepositoryInterface
{

    public function getBrand($brandId): PartBrand;
    public function getBrands(): array;
    public function getBrandByName($name): ?PartBrand;
        
    public function storeBrand(PartBrand $brandObj): PartBrand;
}
