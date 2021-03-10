<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_film;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom_film;

    /**
     * @ORM\Column(type="date")
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $categorie_film;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFilm(): ?int
    {
        return $this->id_film;
    }

    public function setIdFilm(int $id_film): self
    {
        $this->id_film = $id_film;

        return $this;
    }

    public function getNomFilm(): ?string
    {
        return $this->nom_film;
    }

    public function setNomFilm(string $nom_film): self
    {
        $this->nom_film = $nom_film;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getCategorieFilm(): ?string
    {
        return $this->categorie_film;
    }

    public function setCategorieFilm(string $categorie_film): self
    {
        $this->categorie_film = $categorie_film;

        return $this;
    }
}
