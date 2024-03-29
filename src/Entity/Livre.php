<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Auteur",inversedBy: "livres")]
    #[Assert\Type(type:"App\Entity\Auteur")]
    #[Assert\Valid]
    private $auteur;

    #[ORM\Column]
    private ?int $nb_pages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

//    public function getDatePublication(): ?\DateTimeInterface
//    {
//        return $this->date_publication;
//    }

//    public function setDatePublication(\DateTimeInterface $date_publication): static
//    {
//        $this->date_publication = $date_publication;
//
//        return $this;
//    }

    public function getNbPages(): ?int
    {
        return $this->nb_pages;
    }

    public function setNbPages(int $nb_pages): static
    {
        $this->nb_pages = $nb_pages;

        return $this;
    }
}
