<?php

namespace App\Entity;

use App\Repository\TecnicoEncargadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TecnicoEncargadoRepository::class)]
class TecnicoEncargado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nombreTecnico;

    #[ORM\Column(type: 'string', length: 100)]
    private $apellidosTecnico;

    #[ORM\Column(type: 'string', length: 8)]
    private $dni;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $direccion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTecnico(): ?string
    {
        return $this->nombreTecnico;
    }

    public function setNombreTecnico(string $nombreTecnico): self
    {
        $this->nombreTecnico = $nombreTecnico;

        return $this;
    }

    public function getApellidosTecnico(): ?string
    {
        return $this->apellidosTecnico;
    }

    public function setApellidosTecnico(string $apellidosTecnico): self
    {
        $this->apellidosTecnico = $apellidosTecnico;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNombreTecnico().' '.$this->getApellidosTecnico();
    }
}
