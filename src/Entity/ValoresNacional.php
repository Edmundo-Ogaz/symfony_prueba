<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ValoresNacional
 *
 * @ORM\Table(name="valores_nacional", indexes={@ORM\Index(name="IDX_A649601B36CF526F", columns={"id_resolucion_valor"})})
 * @ORM\Entity
 */
class ValoresNacional
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="valores_nacional_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="grado", type="bigint", nullable=true)
     */
    private $grado;

    /**
     * @var float|null
     *
     * @ORM\Column(name="valor_40", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor40;

    /**
     * @var float|null
     *
     * @ORM\Column(name="valor_60", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor60;

    /**
     * @var float|null
     *
     * @ORM\Column(name="valor_100", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor100;

    /**
     * @var \ResolucionValores
     *
     * @ORM\ManyToOne(targetEntity="ResolucionValores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resolucion_valor", referencedColumnName="id")
     * })
     */
    private $idResolucionValor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrado(): ?string
    {
        return $this->grado;
    }

    public function setGrado(?string $grado): self
    {
        $this->grado = $grado;

        return $this;
    }

    public function getValor40(): ?float
    {
        return $this->valor40;
    }

    public function setValor40(?float $valor40): self
    {
        $this->valor40 = $valor40;

        return $this;
    }

    public function getValor60(): ?float
    {
        return $this->valor60;
    }

    public function setValor60(?float $valor60): self
    {
        $this->valor60 = $valor60;

        return $this;
    }

    public function getValor100(): ?float
    {
        return $this->valor100;
    }

    public function setValor100(?float $valor100): self
    {
        $this->valor100 = $valor100;

        return $this;
    }

    public function getIdResolucionValor(): ?ResolucionValores
    {
        return $this->idResolucionValor;
    }

    public function setIdResolucionValor(?ResolucionValores $idResolucionValor): self
    {
        $this->idResolucionValor = $idResolucionValor;

        return $this;
    }


}
