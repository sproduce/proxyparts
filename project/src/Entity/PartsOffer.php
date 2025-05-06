<?php

namespace App\Entity;

use App\Repository\PartsOfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;








#[ORM\Entity(repositoryClass: PartsOfferRepository::class)]
#[ORM\HasLifecycleCallbacks]
class PartsOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $price = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $priceSale = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $amount = null;

    
    
    
    #[ORM\ManyToOne(targetEntity: OfferProperty::class)]
    #[ORM\JoinColumn(name: 'property_id', referencedColumnName: 'id')]
    private OfferProperty $property;
    
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $userId = null;
   

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $propertyId = null;
    
    
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $partId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $public = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $uuid = null;

    #[ORM\ManyToOne(targetEntity: PartNumber::class)]
    #[ORM\JoinColumn(name: 'part_id', referencedColumnName: 'id')]
    private PartNumber $part;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    private User $user;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    
    
    public function __construct(){
        $this->part = new PartNumber();
        //$this->user = new User();
        //$this->property = new OfferProperty();
    }
    
    
    
    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }
   
    
    public function getPartId(): ?int {
        return $this->partId;
    }

    public function setPartId(?int $partId): void {
        $this->partId = $partId;
    }

    
    
    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceSale(): ?int
    {
        return $this->priceSale;
    }

    public function setPriceSale(?int $priceSale): static
    {
        $this->priceSale = $priceSale;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getProperty(): OfferProperty
    {
        return $this->property;
    }

    public function setProperty(OfferProperty $property): static
    {
        $this->property = $property;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?int $public): static
    {
        $this->public = $public;

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

    public function getPart(): PartNumber
    {
        return $this->part;
    }

    public function setPart(PartNumber $part): static
    {
        $this->part = $part;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

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
    
    
    public function getUserId(): ?int {
        return $this->userId;
    }

    public function setUserId(?int $userId): void {
        $this->userId = $userId;
    }


    public function getPropertyId(): ?int {
        return $this->propertyId;
    }
    
    public function setPropertyId(?int $propertyId): void {
        $this->propertyId = $propertyId;
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
