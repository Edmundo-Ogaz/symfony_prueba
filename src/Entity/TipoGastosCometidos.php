<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoGastosCometidos
 *
 * @ORM\Table(name="tipo_gastos_cometidos")
 * @ORM\Entity
 */
class TipoGastosCometidos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_gastos_cometidos_id_tipo_seq", allocationSize=1, initialValue=1)
     */
    private $idTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_gasto", type="string", length=50, nullable=false)
     */
    private $tipoGasto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CometidoNacional", mappedBy="idTipoGasto")
     */
    private $idCometido;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCometido = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdTipo(): ?int
    {
        return $this->idTipo;
    }

    public function getTipoGasto(): ?string
    {
        return $this->tipoGasto;
    }

    public function setTipoGasto(string $tipoGasto): self
    {
        $this->tipoGasto = $tipoGasto;

        return $this;
    }

    /**
     * @return Collection|CometidoNacional[]
     */
    public function getIdCometido(): Collection
    {
        return $this->idCometido;
    }

    public function addIdCometido(CometidoNacional $idCometido): self
    {
        if (!$this->idCometido->contains($idCometido)) {
            $this->idCometido[] = $idCometido;
            $idCometido->addIdTipoGasto($this);
        }

        return $this;
    }

    public function removeIdCometido(CometidoNacional $idCometido): self
    {
        if ($this->idCometido->contains($idCometido)) {
            $this->idCometido->removeElement($idCometido);
            $idCometido->removeIdTipoGasto($this);
        }

        return $this;
    }

}
