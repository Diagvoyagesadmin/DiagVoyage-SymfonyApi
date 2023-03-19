<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VaccinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinRepository::class)]
#[ORM\Table(name: '`vaccins`')]
#[ApiResource]
class Vaccin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $releaseAt = null;

    #[ORM\ManyToMany(targetEntity: Pays::class, mappedBy: 'vaccins')]
    private Collection $pays;

    #[ORM\ManyToMany(targetEntity: Centre::class, inversedBy: 'vaccins')]
    private Collection $centres;

    public function __toString(){
        return $this->nom;
    }

    public function __construct()
    {
        $this->pays = new ArrayCollection();
        $this->centres = new ArrayCollection();
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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

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

    /**
     * @return Collection<int, Pays>
     */
    public function getPays(): Collection
    {
        return $this->pays;
    }

    public function addPay(Pays $pay): self
    {
        if (!$this->pays->contains($pay)) {
            $this->pays->add($pay);
            $pay->addVaccin($this);
        }

        return $this;
    }

    public function removePay(Pays $pay): self
    {
        if ($this->pays->removeElement($pay)) {
            $pay->removeVaccin($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Centre>
     */
    public function getCentres(): Collection
    {
        return $this->centres;
    }

    public function addCentre(Centre $centre): self
    {
        if (!$this->centres->contains($centre)) {
            $this->centres->add($centre);
        }

        return $this;
    }

    public function removeCentre(Centre $centre): self
    {
        $this->centres->removeElement($centre);

        return $this;
    }
}
