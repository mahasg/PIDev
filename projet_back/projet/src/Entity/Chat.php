<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chat")
 * @ORM\Entity
 */
class Chat
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
     * @ORM\Column(name="id_chat", type="integer", nullable=false)
     */
    private $idChat;

    /**
     * @var int
     *
     * @ORM\Column(name="idsender", type="integer", nullable=false)
     */
    private $idsender;

    /**
     * @var int
     *
     * @ORM\Column(name="idreceiver", type="integer", nullable=false)
     */
    private $idreceiver;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="string", length=255, nullable=false)
     */
    private $msg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time", nullable=false)
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdChat(): ?int
    {
        return $this->idChat;
    }

    public function setIdChat(int $idChat): self
    {
        $this->idChat = $idChat;

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
