<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plat
 *
 * @ORM\Table(name="plat")
 * @ORM\Entity
 */
class Plat
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
     * @ORM\Column(name="id_plat", type="integer", nullable=false)
     */
    private $idPlat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_plat", type="string", length=255, nullable=false)
     */
    private $nomPlat;

    /**
     * @var string
     *
     * @ORM\Column(name="description_plat", type="text", length=0, nullable=false)
     */
    private $descriptionPlat;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_plat", type="integer", nullable=false)
     */
    private $prixPlat;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_plat", type="string", length=255, nullable=false)
     */
    private $categoriePlat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlat(): ?int
    {
        return $this->idPlat;
    }

    public function setIdPlat(int $idPlat): self
    {
        $this->idPlat = $idPlat;

        return $this;
    }

    public function getNomPlat(): ?string
    {
        return $this->nomPlat;
    }

    public function setNomPlat(string $nomPlat): self
    {
        $this->nomPlat = $nomPlat;

        return $this;
    }

    public function getDescriptionPlat(): ?string
    {
        return $this->descriptionPlat;
    }

    public function setDescriptionPlat(string $descriptionPlat): self
    {
        $this->descriptionPlat = $descriptionPlat;

        return $this;
    }

    public function getPrixPlat(): ?int
    {
        return $this->prixPlat;
    }

    public function setPrixPlat(int $prixPlat): self
    {
        $this->prixPlat = $prixPlat;

        return $this;
    }

    public function getCategoriePlat(): ?string
    {
        return $this->categoriePlat;
    }

    public function setCategoriePlat(string $categoriePlat): self
    {
        $this->categoriePlat = $categoriePlat;

        return $this;
    }


}
