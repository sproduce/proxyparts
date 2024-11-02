<?php

namespace App\Entity;

use App\Repository\PartBrandRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: PartBrandRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'Производитель уже добавлен')]

class PartBrand
{
    
    public function __construct($name = '') {
        $this->name = $name;
    }
      
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private string $name = '';

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

   public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }
}
