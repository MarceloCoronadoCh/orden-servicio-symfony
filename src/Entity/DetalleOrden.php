<?php

namespace App\Entity;

use App\Repository\DetalleOrdenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetalleOrdenRepository::class)]
class DetalleOrden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observacion;

    #[ORM\ManyToOne(targetEntity: TipoServicio::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $tipoServicioDetalleOrden;

    #[ORM\ManyToOne(targetEntity: OrdenServicio::class, inversedBy: 'detalles')]
    #[ORM\JoinColumn(nullable: false)]
    private $ordenServicio;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getTipoServicioDetalleOrden(): ?TipoServicio
    {
        return $this->tipoServicioDetalleOrden;
    }

    public function setTipoServicioDetalleOrden(?TipoServicio $tipoServicio_DetalleOrden): self
    {
        $this->tipoServicioDetalleOrden = $tipoServicio_DetalleOrden;

        return $this;
    }

    public function getOrdenServicio(): ?OrdenDeServicio
    {
        return $this->ordenServicio;
    }

    public function setOrdenServicio(?OrdenDeServicio $ordenServicio): self
    {
        $this->ordenServicio = $ordenServicio;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
    public function __toString(): string
    {
        return $this->getOrdenServicio();
    }
}