<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuarios", indexes={@ORM\Index(name="fk_usuario_empleado", columns={"empleado_id"})})
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", length=100, nullable=true)
     */
    private $img;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rol", type="string", length=100, nullable=true)
     */
    private $rol;

    /**
     * @var \Empleado
     *
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(?string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getEmpleado(): ?Empleado
    {
        return $this->empleado;
    }

    public function setEmpleado(?Empleado $empleado): self
    {
        $this->empleado = $empleado;

        return $this;
    }


}
