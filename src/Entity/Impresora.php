<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impresora
 *
 * @ORM\Table(name="impresoras", indexes={@ORM\Index(name="fk_impresora_equipo", columns={"equipo_id"})})
 * @ORM\Entity
 */
class Impresora
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
     * @ORM\Column(name="tipo", type="string", length=100, nullable=true)
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     * })
     */
    private $equipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }


}
