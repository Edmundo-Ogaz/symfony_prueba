<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CometidoNacionalCalculo
 *
 * @ORM\Table(name="cometido_nacional_calculo", indexes={@ORM\Index(name="IDX_A82F9908C1C591F", columns={"id_cometido"}), @ORM\Index(name="IDX_A82F990B46674D3", columns={"id_itinerario"})})
 * @ORM\Entity
 */
class CometidoNacionalCalculo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_calculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cometido_nacional_calculo_id_calculo_seq", allocationSize=1, initialValue=1)
     */
    private $idCalculo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dia", type="date", nullable=false)
     */
    private $dia;

    /**
     * @var int|null
     *
     * @ORM\Column(name="valor", type="integer", nullable=true)
     */
    private $valor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="porcentaje_cometido", type="integer", nullable=true)
     */
    private $porcentajeCometido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=false)
     */
    private $fechaRegistro;

    /**
     * @var \CometidoNacional
     *
     * @ORM\ManyToOne(targetEntity="CometidoNacional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cometido", referencedColumnName="id")
     * })
     */
    private $idCometido;

    /**
     * @var \CometidoNacionalItinerario
     *
     * @ORM\ManyToOne(targetEntity="CometidoNacionalItinerario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_itinerario", referencedColumnName="id_itinerario")
     * })
     */
    private $idItinerario;

    public function getIdCalculo(): ?int
    {
        return $this->idCalculo;
    }

    public function getDia(): ?\DateTimeInterface
    {
        return $this->dia;
    }

    public function setDia(\DateTimeInterface $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function setValor(?int $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getPorcentajeCometido(): ?int
    {
        return $this->porcentajeCometido;
    }

    public function setPorcentajeCometido(?int $porcentajeCometido): self
    {
        $this->porcentajeCometido = $porcentajeCometido;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getIdCometido(): ?CometidoNacional
    {
        return $this->idCometido;
    }

    public function setIdCometido(?CometidoNacional $idCometido): self
    {
        $this->idCometido = $idCometido;

        return $this;
    }

    public function getIdItinerario(): ?CometidoNacionalItinerario
    {
        return $this->idItinerario;
    }

    public function setIdItinerario(?CometidoNacionalItinerario $idItinerario): self
    {
        $this->idItinerario = $idItinerario;

        return $this;
    }


}
