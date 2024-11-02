<?php

namespace App\Entity;

use App\Repository\PartNumberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use App\Entity\PartBrand;



use Symfony\Component\Validator\Constraints as Assert;



#[Assert\DisableAutoMapping]



#[ORM\Entity(repositoryClass: PartNumberRepository::class)]
#[ORM\HasLifecycleCallbacks]
class PartNumber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numberText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $uuid = null;
    
    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    //#[ORM\ManyToOne(targetEntity: PartBrand::class)]
    #[JoinColumn(name: 'part_brand_id', referencedColumnName: 'id')]
    #[ORM\JoinColumn(nullable: false)]
    private PartBrand $partBrand;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }
    
    
    
    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getNumberText(): ?string
    {
        return $this->numberText;
    }

    public function setNumberText(?string $numberText): static
    {
        $this->numberText = $numberText;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): static
    {
        $this->info = $info;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getPartBrand(): PartBrand
    {
        if (!$this->partBrand){
            $this->partBrand = new PartBrand();
        }
        return $this->partBrand;
    }

    
    
    
    public function setPartBrand(?PartBrand $partBrand): static
    {
        $this->partBrand = $partBrand;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    
    
    
    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    
    
    #[ORM\PrePersist]
    public function setUuidValue(): void
    {
        $this->uuid = Uuid::v4();
    }
}
