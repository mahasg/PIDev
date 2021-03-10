<?php

namespace App\Entity;

use App\Repository\GuideRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuideRepository::class)
 */
class Guide
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
    private $id_guide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_guide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_guide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite;

    /**
     * @ORM\Column(type="date")
     */
    private $agenda;

    /**
     * @ORM\Column(type="time")
     */
    private $agenda_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGuide(): ?int
    {
        return $this->id_guide;
    }

    public function setIdGuide(int $id_guide): self
    {
        $this->id_guide = $id_guide;

        return $this;
    }

    public function getNomGuide(): ?string
    {
        return $this->nom_guide;
    }

    public function setNomGuide(string $nom_guide): self
    {
        $this->nom_guide = $nom_guide;

        return $this;
    }

    public function getPrenomGuide(): ?string
    {
        return $this->prenom_guide;
    }

    public function setPrenomGuide(string $prenom_guide): self
    {
        $this->prenom_guide = $prenom_guide;

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
        return $this->agenda_time;
    }

    public function setAgendaTime(\DateTimeInterface $agenda_time): self
    {
        $this->agenda_time = $agenda_time;

        return $this;
    }
}
