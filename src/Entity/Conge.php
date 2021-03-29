<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conge
 *
 * @ORM\Table(name="conge")
 * @ORM\Entity
 */
class Conge
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
     * @ORM\Column(name="id_conge", type="integer", nullable=false)
     */
    private $idConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_conge", type="date", nullable=false)
     */
    private $dateConge;

    /**
     * @var string
     *
     * @ORM\Column(name="motif_conge", type="string", length=255, nullable=false)
     */
    private $motifConge;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_jour_conge", type="integer", nullable=false)
     */
    private $nbJourConge;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdConge(): ?int
    {
        return $this->idConge;
    }

    public function setIdConge(int $idConge): self
    {
        $this->idConge = $idConge;

        return $this;
    }

    public function getDateConge(): ?\DateTimeInterface
    {
        return $this->dateConge;
    }

    public function setDateConge(\DateTimeInterface $dateConge): self
    {
        $this->dateConge = $dateConge;

        return $this;
    }

    public function getMotifConge(): ?string
    {
        return $this->motifConge;
    }

    public function setMotifConge(string $motifConge): self
    {
        $this->motifConge = $motifConge;

        return $this;
    }

    public function getNbJourConge(): ?int
    {
        return $this->nbJourConge;
    }

    public function setNbJourConge(int $nbJourConge): self
    {
        $this->nbJourConge = $nbJourConge;

        return $this;
    }


}
