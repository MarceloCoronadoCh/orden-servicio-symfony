<?php

namespace App\Entity;

use App\Repository\EquipoMarcaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipoMarcaRepository::class)]
class EquipoMarca
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nombreMarca;

    #[ORM\Column(type: 'text', nullable: true)]
    private $detalleMarca;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreMarca(): ?string
    {
        return $this->nombreMarca;
    }

    public function setNombreMarca(string $nombreMarca): self
    {
        $this->nombreMarca = $nombreMarca;

        return $this;
    }

    public function getDetalleMarca(): ?string
    {
        return $this->detalleMarca;
    }

    public function setDetalleMarca(?string $detalleMarca): self
    {
        $this->detalleMarca = $detalleMarca;

        return $this;
    }

    public function __toString()
    {
        return $this->getNombreMarca();
    }
}
