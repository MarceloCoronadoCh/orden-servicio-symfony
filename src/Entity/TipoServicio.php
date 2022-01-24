<?php

namespace App\Entity;

use App\Repository\TipoServicioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoServicioRepository::class)]
class TipoServicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nombreServicio;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $detalleServicio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreServicio(): ?string
    {
        return $this->nombreServicio;
    }

    public function setNombreServicio(string $nombreServicio): self
    {
        $this->nombreServicio = $nombreServicio;

        return $this;
    }

    public function getDetalleServicio(): ?string
    {
        return $this->detalleServicio;
    }

    public function setDetalleServicio(?string $detalleServicio): self
    {
        $this->detalleServicio = $detalleServicio;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNombreServicio();
    }
}
