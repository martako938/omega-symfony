<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleados
 *
 * @ORM\Table(name="empleados", indexes={@ORM\Index(name="fk_empleado_sucursal", columns={"sucursal_id"}), @ORM\Index(name="fk_empleado_puesto", columns={"puesto_id"})})
 * @ORM\Entity
 */
class Empleados
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
     * @var int|null
     *
     * @ORM\Column(name="numero_Checador", type="integer", nullable=true)
     */
    private $numeroChecador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Puestos
     *
     * @ORM\ManyToOne(targetEntity="Puestos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="puesto_id", referencedColumnName="id")
     * })
     */
    private $puesto;

    /**
     * @var \Sucursales
     *
     * @ORM\ManyToOne(targetEntity="Sucursales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     * })
     */
    private $sucursal;

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

    public function getNumeroChecador(): ?int
    {
        return $this->numeroChecador;
    }

    public function setNumeroChecador(?int $numeroChecador): self
    {
        $this->numeroChecador = $numeroChecador;

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

    public function getPuesto(): ?Puestos
    {
        return $this->puesto;
    }

    public function setPuesto(?Puestos $puesto): self
    {
        $this->puesto = $puesto;

        return $this;
    }

    public function getSucursal(): ?Sucursales
    {
        return $this->sucursal;
    }

    public function setSucursal(?Sucursales $sucursal): self
    {
        $this->sucursal = $sucursal;

        return $this;
    }


}
