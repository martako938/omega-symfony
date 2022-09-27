<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checador
 *
 * @ORM\Table(name="checadores")
 * @ORM\Entity
 */
class Checador
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
     * @var string
     *
     * @ORM\Column(name="serietag", type="string", length=255, nullable=false)
     */
    private $serietag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura", type="string", length=255, nullable=true)
     */
    private $factura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cotizacion", type="string", length=255, nullable=true)
     */
    private $cotizacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;

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

    public function getSerietag(): ?string
    {
        return $this->serietag;
    }

    public function setSerietag(string $serietag): self
    {
        $this->serietag = $serietag;

        return $this;
    }

    public function getFactura(): ?string
    {
        return $this->factura;
    }

    public function setFactura(?string $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getCotizacion(): ?string
    {
        return $this->cotizacion;
    }

    public function setCotizacion(?string $cotizacion): self
    {
        $this->cotizacion = $cotizacion;

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


}
