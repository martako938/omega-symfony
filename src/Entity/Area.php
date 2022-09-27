<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Area
 *
 * @ORM\Table(name="areas")
 * @ORM\Entity
 */
// Se agrega implements \JsonSerializable y el metodo public function jsonSerialize() para ver la response
class Area implements \JsonSerializable
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
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=true)
     */
    private $descripcion;
    
    //Agregamos esto para hacer redundacia en la busqueda
      /**
     * @ORM\OneToMany(targetEntity="App\Entity\Puesto", mappedBy="area")
     */
    private $puestos;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
    //Agregamos esto para hacer redundacia en la busqueda
    /*
     * @return Collection|Puesto[]
     */

    public function getPuestos(): Collection {
        return $this->puestos;
    }

    //Para serializar el objeto en json
    public function jsonSerialize(): array{
        return[
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ];
    }

}
