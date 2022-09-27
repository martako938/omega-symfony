<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pc
 *
 * @ORM\Table(name="pcs", indexes={@ORM\Index(name="fk_pc_equipo", columns={"equipo_id"})})
 * @ORM\Entity
 */
class Pc
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
     * @ORM\Column(name="sistema", type="string", length=100, nullable=true)
     */
    private $sistema;

    /**
     * @var string|null
     *
     * @ORM\Column(name="office", type="string", length=100, nullable=true)
     */
    private $office;

    /**
     * @var string|null
     *
     * @ORM\Column(name="procesador", type="string", length=100, nullable=true)
     */
    private $procesador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="disco", type="string", length=100, nullable=true)
     */
    private $disco;

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

    public function getSistema(): ?string
    {
        return $this->sistema;
    }

    public function setSistema(?string $sistema): self
    {
        $this->sistema = $sistema;

        return $this;
    }

    public function getOffice(): ?string
    {
        return $this->office;
    }

    public function setOffice(?string $office): self
    {
        $this->office = $office;

        return $this;
    }

    public function getProcesador(): ?string
    {
        return $this->procesador;
    }

    public function setProcesador(?string $procesador): self
    {
        $this->procesador = $procesador;

        return $this;
    }

    public function getDisco(): ?string
    {
        return $this->disco;
    }

    public function setDisco(?string $disco): self
    {
        $this->disco = $disco;

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
