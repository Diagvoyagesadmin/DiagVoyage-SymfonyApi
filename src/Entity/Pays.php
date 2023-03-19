<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
#[ORM\Table(name: '`pays`')]
#[ApiResource(
    operations: [
    new Get(),
    new GetCollection()
    ]
)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'pays', targetEntity: AdresseUtil::class, orphanRemoval: true)]
    private Collection $adressesUtil;

    #[ORM\OneToMany(mappedBy: 'pays', targetEntity: InfoPratique::class, orphanRemoval: true)]
    private Collection $infosPratique;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'pays')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: AchatConseille::class, inversedBy: 'pays')]
    private Collection $achatsConseille;

    #[ORM\ManyToMany(targetEntity: Maladie::class, inversedBy: 'pays')]
    private Collection $maladies;

    #[ORM\ManyToMany(targetEntity: Vaccin::class, inversedBy: 'pays')]
    private Collection $vaccins;

    public function __construct()
    {
        $this->adressesUtil = new ArrayCollection();
        $this->infosPratique = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->achatsConseille = new ArrayCollection();
        $this->maladies = new ArrayCollection();
        $this->vaccins = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addPay($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removePay($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AchatConseille>
     */
    public function getAchatsConseille(): Collection
    {
        return $this->achatsConseille;
    }

    public function addAchatsConseille(AchatConseille $achatsConseille): self
    {
        if (!$this->achatsConseille->contains($achatsConseille)) {
            $this->achatsConseille->add($achatsConseille);
        }

        return $this;
    }

    public function removeAchatsConseille(AchatConseille $achatsConseille): self
    {
        $this->achatsConseille->removeElement($achatsConseille);

        return $this;
    }

    /**
     * @return Collection<int, Maladie>
     */
    public function getMaladies(): Collection
    {
        return $this->maladies;
    }

    public function addMalady(Maladie $malady): self
    {
        if (!$this->maladies->contains($malady)) {
            $this->maladies->add($malady);
        }

        return $this;
    }

    public function removeMalady(Maladie $malady): self
    {
        $this->maladies->removeElement($malady);

        return $this;
    }

    /**
     * @return Collection<int, Vaccin>
     */
    public function getVaccins(): Collection
    {
        return $this->vaccins;
    }

    public function addVaccin(Vaccin $vaccin): self
    {
        if (!$this->vaccins->contains($vaccin)) {
            $this->vaccins->add($vaccin);
        }

        return $this;
    }

    public function removeVaccin(Vaccin $vaccin): self
    {
        $this->vaccins->removeElement($vaccin);

        return $this;
    }
}
