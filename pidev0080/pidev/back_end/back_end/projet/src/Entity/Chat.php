<?php

namespace App\Entity;

use App\Repository\ChatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChatRepository::class)
 */
class Chat
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
    private $id_chat;

    /**
     * @ORM\Column(type="integer")
     */
    private $idsender;

    /**
     * @ORM\Column(type="integer")
     */
    private $idreceiver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $msg;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdChat(): ?int
    {
        return $this->id_chat;
    }

    public function setIdChat(int $id_chat): self
    {
        $this->id_chat = $id_chat;

        return $this;
    }

    public function getIdsender(): ?int
    {
        return $this->idsender;
    }

    public function setIdsender(int $idsender): self
    {
        $this->idsender = $idsender;

        return $this;
    }

    public function getIdreceiver(): ?int
    {
        return $this->idreceiver;
    }

    public function setIdreceiver(int $idreceiver): self
    {
        $this->idreceiver = $idreceiver;

        return $this;
    }

    public function getMsg(): ?string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): self
    {
        $this->msg = $msg;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }
}
