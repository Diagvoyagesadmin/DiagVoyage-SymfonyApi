<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
#[ORM\Table(name: '`pays`')]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('read')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'pays', targetEntity: AdresseUtil::class, orphanRemoval: true)]
    #[Groups('read')]
    private Collection $adressesUtil;

    #[Groups('read')]
    #[ORM\OneToMany(mappedBy: 'pays', targetEntity: InfoPratique::class, orphanRemoval: true)]
    private Collection $infosPratique;

    public function __construct()
    {
        $this->adressesUtil = new ArrayCollection();
        $this->infosPratique = new ArrayCollection();
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

    /**
     * @return Collection<int, AdresseUtil>
     */
    public function getAdressesUtil(): Collection
    {
        return $this->adressesUtil;
    }

    public function addAdressesUtil(AdresseUtil $adressesUtil): self
    {
        if (!$this->adressesUtil->contains($adressesUtil)) {
            $this->adressesUtil->add($adressesUtil);
            $adressesUtil->setPays($this);
        }

        return $this;
    }

    public function removeAdressesUtil(AdresseUtil $adressesUtil): self
    {
        if ($this->adressesUtil->removeElement($adressesUtil)) {
            // set the owning side to null (unless already changed)
            if ($adressesUtil->getPays() === $this) {
                $adressesUtil->setPays(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InfoPratique>
     */
    public function getInfosPratique(): Collection
    {
        return $this->infosPratique;
    }

    public function addInfosPratique(InfoPratique $infosPratique): self
    {
        if (!$this->infosPratique->contains($infosPratique)) {
            $this->infosPratique->add($infosPratique);
            $infosPratique->setPays($this);
        }

        return $this;
    }

    public function removeInfosPratique(InfoPratique $infosPratique): self
    {
        if ($this->infosPratique->removeElement($infosPratique)) {
            // set the owning side to null (unless already changed)
            if ($infosPratique->getPays() === $this) {
                $infosPratique->setPays(null);
            }
        }

        return $this;
    }
}
