<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_film", type="integer", nullable=false)
     */
    private $idFilm;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_film", type="string", length=30, nullable=false)
     */
    private $nomFilm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie", type="date", nullable=false)
     */
    private $dateSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_film", type="string", length=30, nullable=false)
     */
    private $categorieFilm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFilm(): ?int
    {
        return $this->idFilm;
    }

    public function setIdFilm(int $idFilm): self
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    public function getNomFilm(): ?string
    {
        return $this->nomFilm;
    }

    public function setNomFilm(string $nomFilm): self
    {
        $this->nomFilm = $nomFilm;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getCategorieFilm(): ?string
    {
        return $this->categorieFilm;
    }

    public function setCategorieFilm(string $categorieFilm): self
    {
        $this->categorieFilm = $categorieFilm;

        return $this;
    }


}
