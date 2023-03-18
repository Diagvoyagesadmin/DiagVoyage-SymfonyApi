<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\InfoPratiqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoPratiqueRepository::class)]
#[ORM\Table(name: '`infosPratique`')]
#[ApiResource]
class InfoPratique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $releaseAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReleaseAt(): ?\DateTimeImmutable
    {
        return $this->releaseAt;
    }

    public function setReleaseAt(\DateTimeImmutable $releaseAt): self
    {
        $this->releaseAt = $releaseAt;

        return $this;
    }
}
