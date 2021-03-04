<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity
 */
class Employe
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
     * @ORM\Column(name="id_employe", type="integer", nullable=false)
     */
    private $idEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_employe", type="string", length=50, nullable=false)
     */
    private $nomEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_employe", type="string", length=50, nullable=false)
     */
    private $prenomEmploye;

    /**
     * @var int
     *
     * @ORM\Column(name="num_tel_employe", type="integer", nullable=false)
     */
    private $numTelEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_employe", type="string", length=100, nullable=false)
     */
    private $adresseEmploye;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEmploye(): ?int
    {
        return $this->idEmploye;
    }

    public function setIdEmploye(int $idEmploye): self
    {
        $this->idEmploye = $idEmploye;

        return $this;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nomEmploye;
    }

    public function setNomEmploye(string $nomEmploye): self
    {
        $this->nomEmploye = $nomEmploye;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenomEmploye;
    }

    public function setPrenomEmploye(string $prenomEmploye): self
    {
        $this->prenomEmploye = $prenomEmploye;

        return $this;
    }

    public function getNumTelEmploye(): ?int
    {
        return $this->numTelEmploye;
    }

    public function setNumTelEmploye(int $numTelEmploye): self
    {
        $this->numTelEmploye = $numTelEmploye;

        return $this;
    }

    public function getAdresseEmploye(): ?string
    {
        return $this->adresseEmploye;
    }

    public function setAdresseEmploye(string $adresseEmploye): self
    {
        $this->adresseEmploye = $adresseEmploye;

        return $this;
    }


}
