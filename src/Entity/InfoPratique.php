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

    #[ORM\ManyToOne(inversedBy: 'infosPratique')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $pays = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stateOfVoyage = null;

    public function __toString(){
        return $this->nom;
    }

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

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getStateOfVoyage(): ?string
    {
        return $this->stateOfVoyage;
    }

    public function setStateOfVoyage(string $stateOfVoyage): self
    {
        $this->stateOfVoyage = $stateOfVoyage;

        return $this;
    }
}
