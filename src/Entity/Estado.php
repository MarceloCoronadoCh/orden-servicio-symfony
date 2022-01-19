<?php

namespace App\Entity;

use App\Repository\EstadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstadoRepository::class)]
class Estado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nombreEstado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreEstado(): ?string
    {
        return $this->nombreEstado;
    }

    public function setNombreEstado(string $nombreEstado): self
    {
        $this->nombreEstado = $nombreEstado;

        return $this;
    }
}
