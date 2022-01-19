<?php

namespace App\Entity;

use App\Repository\TipoPagoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoPagoRepository::class)]
class TipoPago
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nombreTipoPago;

    #[ORM\Column(type: 'text', nullable: true)]
    private $descripcionTipoPago;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTipoPago(): ?string
    {
        return $this->nombreTipoPago;
    }

    public function setNombreTipoPago(string $nombreTipoPago): self
    {
        $this->nombreTipoPago = $nombreTipoPago;

        return $this;
    }

    public function getDescripcionTipoPago(): ?string
    {
        return $this->descripcionTipoPago;
    }

    public function setDescripcionTipoPago(?string $descripcionTipoPago): self
    {
        $this->descripcionTipoPago = $descripcionTipoPago;

        return $this;
    }
}
