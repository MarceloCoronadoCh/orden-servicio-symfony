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

    #[ORM\Column(type: 'string', length: 50)]
    private $nombreServicio;

    #[ORM\Column(type: 'text', nullable: true)]
    private $detalleServicio;

    #[ORM\ManyToOne(targetEntity: DetalleOrden::class, inversedBy: 'tipoServicioDetalleOrden')]
    #[ORM\JoinColumn(nullable: false)]
    private $tipoServicioDetalleOrden;

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

    public function getTipoServicioDetalleOrden(): ?DetalleOrden
    {
        return $this->tipoServicioDetalleOrden;
    }

    public function setTipoServicioDetalleOrden(?DetalleOrden $tipoServicioDetalleOrden): self
    {
        $this->tipoServicioDetalleOrden = $tipoServicioDetalleOrden;

        return $this;
    }

    public function __toString(): string{

        return $this ->getNombreServicio();
    }
}
