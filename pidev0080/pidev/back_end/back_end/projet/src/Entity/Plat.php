<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $idp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomp;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixp;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Categorie_id", referencedColumnName="idc")
     * })
     */
    private $categorie;

    /**
     * @Assert\File(maxSize="10000000")
     */
    public $file ;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(mimeTypes = {"image/jpeg", "image/png", "image/jpg"})
     */
    private $imagep;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function setIdp(int $idp): self
    {
        $this->idp = $idp;

        return $this;
    }

    public function getNomp(): ?string
    {
        return $this->nomp;
    }

    public function setNomp(string $nomp): self
    {
        $this->nomp = $nomp;

        return $this;
    }

    public function getPrixp(): ?int
    {
        return $this->prixp;
    }

    public function setPrixp(int $prixp): self
    {
        $this->prixp = $prixp;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImagep(): ?string
    {
        return $this->imagep;
    }

    public function setImagep(string $imagep): self
    {
        $this->imagep = $imagep;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

}
