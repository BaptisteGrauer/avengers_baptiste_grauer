<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

//    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
//    private ?\DateTimeInterface $date_naissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

//    public function getDateNaissance(): ?\DateTimeInterface
//    {
//        return $this->date_naissance;
//    }
//
//    public function setDateNaissance(\DateTimeInterface $date_naissance): static
//    {
//        $this->date_naissance = $date_naissance;
//
//        return $this;
//    }

    public function __toString(): string
    {
        return $this->nom. " " .$this->prenom;
    }
}
