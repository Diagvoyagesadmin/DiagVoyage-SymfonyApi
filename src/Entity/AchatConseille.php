<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AchatConseilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchatConseilleRepository::class)]
#[ORM\Table(name: '`achatsConseille`')]
#[ApiResource]
class AchatConseille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $prixMoyen = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixMoyen(): ?string
    {
        return $this->prixMoyen;
    }

    public function setPrixMoyen(string $prixMoyen): self
    {
        $this->prixMoyen = $prixMoyen;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
