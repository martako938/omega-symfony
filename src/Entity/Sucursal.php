<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sucursales
 *
 * @ORM\Table(name="sucursales", indexes={@ORM\Index(name="fk_sucursal_checador", columns={"checador_id"})})
 * @ORM\Entity
 */
class Sucursales
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviatura", type="string", length=255, nullable=true)
     */
    private $abreviatura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Checadores
     *
     * @ORM\ManyToOne(targetEntity="Checadores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="checador_id", referencedColumnName="id")
     * })
     */
    private $checador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAbreviatura(): ?string
    {
        return $this->abreviatura;
    }

    public function setAbreviatura(?string $abreviatura): self
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getChecador(): ?Checadores
    {
        return $this->checador;
    }

    public function setChecador(?Checadores $checador): self
    {
        $this->checador = $checador;

        return $this;
    }


}
