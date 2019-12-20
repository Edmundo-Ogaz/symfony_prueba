<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CometidoEstados
 *
 * @ORM\Table(name="cometido_estados")
 * @ORM\Entity
 */
class CometidoEstados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cometido_estados_id_estado_seq", allocationSize=1, initialValue=1)
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50, nullable=false)
     */
    private $estado;

    public function getIdEstado(): ?int
    {
        return $this->idEstado;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }


}
