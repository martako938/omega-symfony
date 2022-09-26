<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipos
 *
 * @ORM\Table(name="equipos", indexes={@ORM\Index(name="fk_equipo_empleado", columns={"empleado_id"}), @ORM\Index(name="fk_equipo_factura", columns={"factura_id"})})
 * @ORM\Entity
 */
class Equipos
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
     * @ORM\Column(name="serietag", type="string", length=100, nullable=false)
     */
    private $serietag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marca", type="string", length=100, nullable=true)
     */
    private $marca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Empleados
     *
     * @ORM\ManyToOne(targetEntity="Empleados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;

    /**
     * @var \Facturas
     *
     * @ORM\ManyToOne(targetEntity="Facturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="factura_id", referencedColumnName="id")
     * })
     */
    private $factura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerietag(): ?string
    {
        return $this->serietag;
    }

    public function setSerietag(string $serietag): self
    {
        $this->serietag = $serietag;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(?string $marca): self
    {
        $this->marca = $marca;

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

    public function getEmpleado(): ?Empleados
    {
        return $this->empleado;
    }

    public function setEmpleado(?Empleados $empleado): self
    {
        $this->empleado = $empleado;

        return $this;
    }

    public function getFactura(): ?Facturas
    {
        return $this->factura;
    }

    public function setFactura(?Facturas $factura): self
    {
        $this->factura = $factura;

        return $this;
    }


}
