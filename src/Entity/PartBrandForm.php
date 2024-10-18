<?php

namespace App\Entity;


class PartBrandForm
{
    private ?int $id = null;

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
