<?php

namespace App\Entity;

use App\Repository\OrdenServicioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdenServicioRepository::class)]
class OrdenServicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $cliente;

    #[ORM\Column(type: 'datetime')]
    private $fechaOrden;

    #[ORM\ManyToOne(targetEntity: TecnicoEncargado::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $tecnicoEncargado;


    #[ORM\Column(type: 'string', length: 50)]
    private $numeroOrden;

    #[ORM\OneToMany(mappedBy: 'ordenServicio', targetEntity: DetalleOrden::class, cascade: ['persist','remove'],  orphanRemoval: true)]
    private $ordenServicio;



    public function __construct()
    {
        
        $this->ordenServicio = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getTecnicoEncargado(): ?TecnicoEncargado
    {
        return $this->tecnicoEncargado;
    }

    public function setTecnicoEncargado(?TecnicoEncargado $tecnicoEncargado): self
    {
        $this->tecnicoEncargado = $tecnicoEncargado;

        return $this;
    }


    public function getNumeroOrden(): ?string
    {
        return $this->numeroOrden;
    }

    public function setNumeroOrden(string $numeroOrden): self
    {
        $this->numeroOrden = $numeroOrden;

        return $this;
    }


    /**
     * @return Collection|DetalleOrden[]
     */
    public function getOrdenServicio(): Collection
    {
        return $this->ordenServicio;
    }

    public function addOrdenServicio(DetalleOrden $ordenServicio): self
    {
        if (!$this->ordenServicio->contains($ordenServicio)) {
            $this->ordenServicio[] = $ordenServicio;
            $ordenServicio->setOrdenServicio($this);
        }

        return $this;
    }

    public function removeOrdenServicio(DetalleOrden $ordenServicio): self
    {
        if ($this->ordenServicio->removeElement($ordenServicio)) {
            // set the owning side to null (unless already changed)
            if ($ordenServicio->getOrdenServicio() === $this) {
                $ordenServicio->setOrdenServicio(null);
            }
        }

        return $this;
    }

    public function getFechaOrden(): ?\DateTimeInterface
    {
        return $this->fechaOrden;
    }

    public function setFechaOrden(\DateTimeInterface $fechaOrden): self
    {
        $this->fechaOrden = $fechaOrden;

        return $this;
    }
}
