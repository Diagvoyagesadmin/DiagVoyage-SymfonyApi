<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\MaladieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieRepository::class)]
#[ORM\Table(name: '`maladies`')]
#[ApiResource]
/*
(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)
*/
class Maladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    //#[Groups('read')]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
  //  #[Groups(['read', 'write'])]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
   // #[Groups(['read', 'write'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    //#[Groups(['read', 'write'])]
    private ?string $mode_contamination = null;

    #[ORM\ManyToMany(targetEntity: Pays::class, mappedBy: 'maladies')]
    //#[Groups(['read', 'write'])]
    private Collection $pays;

    #[ORM\ManyToMany(targetEntity: Symptome::class, inversedBy: 'maladies')]
    //#[Groups(['read', 'write'])]
    private Collection $symptomes;

    #[ORM\ManyToMany(targetEntity: Centre::class, inversedBy: 'maladies')]
    //#[Groups(['read', 'write'])]
    private Collection $centres;

    public function __toString(){
        return $this->nom;
    }

    public function __construct()
    {
        $this->pays = new ArrayCollection();
        $this->symptomes = new ArrayCollection();
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

    public function getModeContamination(): ?string
    {
        return $this->mode_contamination;
    }

    public function setModeContamination(string $mode_contamination): self
    {
        $this->mode_contamination = $mode_contamination;

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
            $pay->addMalady($this);
        }

        return $this;
    }

    public function removePay(Pays $pay): self
    {
        if ($this->pays->removeElement($pay)) {
            $pay->removeMalady($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Symptome>
     */
    public function getSymptomes(): Collection
    {
        return $this->symptomes;
    }

    public function addSymptome(Symptome $symptome): self
    {
        if (!$this->symptomes->contains($symptome)) {
            $this->symptomes->add($symptome);
        }

        return $this;
    }

    public function removeSymptome(Symptome $symptome): self
    {
        $this->symptomes->removeElement($symptome);

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
