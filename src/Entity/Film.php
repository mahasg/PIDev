<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8244BE22BF396750", columns={"id"})})
 * @ORM\Entity
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="idfilm", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfilm;

    /**
     * @var string
     *
     * @ORM\Column(name="nomfilm", type="string", length=255, nullable=false)
     */
    private $nomfilm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datesortie", type="date", nullable=false)
     */
    private $datesortie;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionf", type="string", length=255, nullable=false)
     */
    private $descriptionf;

    /**
     * @var string
     *
     * @ORM\Column(name="imagef", type="string", length=255, nullable=false)
     */
    private $imagef;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getIdfilm(): ?int
    {
        return $this->idfilm;
    }

    public function getNomfilm(): ?string
    {
        return $this->nomfilm;
    }

    public function setNomfilm(string $nomfilm): self
    {
        $this->nomfilm = $nomfilm;

        return $this;
    }

    public function getDatesortie(): ?\DateTimeInterface
    {
        return $this->datesortie;
    }

    public function setDatesortie(\DateTimeInterface $datesortie): self
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    public function getDescriptionf(): ?string
    {
        return $this->descriptionf;
    }

    public function setDescriptionf(string $descriptionf): self
    {
        $this->descriptionf = $descriptionf;

        return $this;
    }

    public function getImagef(): ?string
    {
        return $this->imagef;
    }

    public function setImagef(string $imagef): self
    {
        $this->imagef = $imagef;

        return $this;
    }

    public function getId(): ?Categorie
    {
        return $this->id;
    }

    public function setId(?Categorie $id): self
    {
        $this->id = $id;

        return $this;
    }


}
