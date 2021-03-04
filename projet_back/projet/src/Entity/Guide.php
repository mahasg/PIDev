<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guide
 *
 * @ORM\Table(name="guide")
 * @ORM\Entity
 */
class Guide
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
     * @ORM\Column(name="id_guide", type="integer", nullable=false)
     */
    private $idGuide;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_guide", type="string", length=255, nullable=false)
     */
    private $nomGuide;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_guide", type="string", length=255, nullable=false)
     */
    private $prenomGuide;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=255, nullable=false)
     */
    private $activite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="agenda", type="date", nullable=false)
     */
    private $agenda;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="agenda_time", type="time", nullable=false)
     */
    private $agendaTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGuide(): ?int
    {
        return $this->idGuide;
    }

    public function setIdGuide(int $idGuide): self
    {
        $this->idGuide = $idGuide;

        return $this;
    }

    public function getNomGuide(): ?string
    {
        return $this->nomGuide;
    }

    public function setNomGuide(string $nomGuide): self
    {
        $this->nomGuide = $nomGuide;

        return $this;
    }

    public function getPrenomGuide(): ?string
    {
        return $this->prenomGuide;
    }

    public function setPrenomGuide(string $prenomGuide): self
    {
        $this->prenomGuide = $prenomGuide;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAgenda(): ?\DateTimeInterface
    {
        return $this->agenda;
    }

    public function setAgenda(\DateTimeInterface $agenda): self
    {
        $this->agenda = $agenda;

        return $this;
    }

    public function getAgendaTime(): ?\DateTimeInterface
    {
        return $this->agendaTime;
    }

    public function setAgendaTime(\DateTimeInterface $agendaTime): self
    {
        $this->agendaTime = $agendaTime;

        return $this;
    }


}
