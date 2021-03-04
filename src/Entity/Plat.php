<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
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
    private $id_plat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_plat;

    /**
     * @ORM\Column(type="text")
     */
    private $description_plat;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_plat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie_plat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlat(): ?int
    {
        return $this->id_plat;
    }

    public function setIdPlat(int $id_plat): self
    {
        $this->id_plat = $id_plat;

        return $this;
    }

    public function getNomPlat(): ?string
    {
        return $this->nom_plat;
    }

    public function setNomPlat(string $nom_plat): self
    {
        $this->nom_plat = $nom_plat;

        return $this;
    }

    public function getDescriptionPlat(): ?string
    {
        return $this->description_plat;
    }

    public function setDescriptionPlat(string $description_plat): self
    {
        $this->description_plat = $description_plat;

        return $this;
    }

    public function getPrixPlat(): ?int
    {
        return $this->prix_plat;
    }

    public function setPrixPlat(int $prix_plat): self
    {
        $this->prix_plat = $prix_plat;

        return $this;
    }

    public function getCategoriePlat(): ?string
    {
        return $this->categorie_plat;
    }

    public function setCategoriePlat(string $categorie_plat): self
    {
        $this->categorie_plat = $categorie_plat;

        return $this;
    }
}
