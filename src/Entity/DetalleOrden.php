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

    #[ORM\ManyToOne(targetEntity: Equipo::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $equipoDetalleOrden;

    #[ORM\ManyToOne(targetEntity: TipoServicio::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $tipoServicioDetalleOrden;

    #[ORM\Column(type: 'datetime')]
    private $fechaIngreso;

    #[ORM\Column(type: 'datetime')]
    private $fechaEntrega;

    #[ORM\Column(type: 'text', nullable: true)]
    private $observacion;

    #[ORM\ManyToOne(targetEntity: OrdenServicio::class, inversedBy: 'ordenServicio')]
    #[ORM\JoinColumn(nullable: false)]
    private $ordenServicio;

    #[ORM\ManyToMany(targetEntity: Estado::class)]
    private $estadoDetalleOrden;

    public function __construct()
    {
        $this->estadoDetalleOrden = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipoDetalleOrden(): ?Equipo
    {
        return $this->equipoDetalleOrden;
    }

    public function setEquipoDetalleOrden(?Equipo $equipoDetalleOrden): self
    {
        $this->equipoDetalleOrden = $equipoDetalleOrden;

        return $this;
    }

    public function getTipoServicioDetalleOrden(): ?TipoServicio
    {
        return $this->tipoServicioDetalleOrden;
    }

    public function setTipoServicioDetalleOrden(?TipoServicio $tipoServicioDetalleOrden): self
    {
        $this->tipoServicioDetalleOrden = $tipoServicioDetalleOrden;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fechaIngreso): self
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getFechaEntrega(): ?\DateTimeInterface
    {
        return $this->fechaEntrega;
    }

    public function setFechaEntrega(\DateTimeInterface $fechaEntrega): self
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
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

    public function getOrdenServicio(): ?OrdenServicio
    {
        return $this->ordenServicio;
    }

    public function setOrdenServicio(?OrdenServicio $ordenServicio): self
    {
        $this->ordenServicio = $ordenServicio;

        return $this;
    }

    /**
     * @return Collection|Estado[]
     */
    public function getEstadoDetalleOrden(): Collection
    {
        return $this->estadoDetalleOrden;
    }

    public function addEstadoDetalleOrden(Estado $estadoDetalleOrden): self
    {
        if (!$this->estadoDetalleOrden->contains($estadoDetalleOrden)) {
            $this->estadoDetalleOrden[] = $estadoDetalleOrden;
        }

        return $this;
    }

    public function removeEstadoDetalleOrden(Estado $estadoDetalleOrden): self
    {
        $this->estadoDetalleOrden->removeElement($estadoDetalleOrden);

        return $this;
    }
}
