<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responsivas
 *
 * @ORM\Table(name="responsivas", indexes={@ORM\Index(name="fk_responsiva_equipo", columns={"equipo_id"})})
 * @ORM\Entity
 */
class Responsivas
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
     * @var string|null
     *
     * @ORM\Column(name="folio", type="string", length=100, nullable=true)
     */
    private $folio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha", type="string", length=100, nullable=true)
     */
    private $fecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Equipos
     *
     * @ORM\ManyToOne(targetEntity="Equipos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     * })
     */
    private $equipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFolio(): ?string
    {
        return $this->folio;
    }

    public function setFolio(?string $folio): self
    {
        $this->folio = $folio;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(?string $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getEquipo(): ?Equipos
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipos $equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }


}
