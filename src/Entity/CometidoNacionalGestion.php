<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CometidoNacionalGestion
 *
 * @ORM\Table(name="cometido_nacional_gestion", indexes={@ORM\Index(name="IDX_334C9A16C297D64", columns={"cometido_nacional_id"})})
 * @ORM\Entity
 */
class CometidoNacionalGestion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cometido_nacional_gestion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_verificar_disponibilidad_presupuestaria_observacion", type="text", nullable=true)
     */
    private $solicitudVerificarDisponibilidadPresupuestariaObservacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_evaluar_solicitud_jefatura_observacion", type="text", nullable=true)
     */
    private $solicitudEvaluarSolicitudJefaturaObservacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_evaluar_solicitud_jefatura_usuario", type="text", nullable=true)
     */
    private $solicitudEvaluarSolicitudJefaturaUsuario;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="solicitud_evaluar_solicitud_jefatura_fecha", type="datetime", nullable=true)
     */
    private $solicitudEvaluarSolicitudJefaturaFecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_verificar_disponibilidad_presupuestaria_usuario", type="text", nullable=true)
     */
    private $solicitudVerificarDisponibilidadPresupuestariaUsuario;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="solicitud_verificar_disponibilidad_presupuestaria_fecha", type="datetime", nullable=true)
     */
    private $solicitudVerificarDisponibilidadPresupuestariaFecha;

    /**
     * @var int|null
     *
     * @ORM\Column(name="solicitud_preafectar_id", type="integer", nullable=true)
     */
    private $solicitudPreafectarId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="solicitud_preafectar_folio", type="integer", nullable=true)
     */
    private $solicitudPreafectarFolio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_preafectar_imputacion", type="text", nullable=true)
     */
    private $solicitudPreafectarImputacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_preafectar_memo", type="text", nullable=true)
     */
    private $solicitudPreafectarMemo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_preafectar_observacion", type="text", nullable=true)
     */
    private $solicitudPreafectarObservacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_preafectar_usuario", type="text", nullable=true)
     */
    private $solicitudPreafectarUsuario;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="solicitud_preafectar_fecha", type="datetime", nullable=true)
     */
    private $solicitudPreafectarFecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitud_preafectar_preafectacion_status", type="text", nullable=true)
     */
    private $solicitudPreafectarPreafectacionStatus;

    /**
     * @var \CometidoNacional
     *
     * @ORM\ManyToOne(targetEntity="CometidoNacional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cometido_nacional_id", referencedColumnName="id")
     * })
     */
    private $cometidoNacional;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSolicitudVerificarDisponibilidadPresupuestariaObservacion(): ?string
    {
        return $this->solicitudVerificarDisponibilidadPresupuestariaObservacion;
    }

    public function setSolicitudVerificarDisponibilidadPresupuestariaObservacion(?string $solicitudVerificarDisponibilidadPresupuestariaObservacion): self
    {
        $this->solicitudVerificarDisponibilidadPresupuestariaObservacion = $solicitudVerificarDisponibilidadPresupuestariaObservacion;

        return $this;
    }

    public function getSolicitudEvaluarSolicitudJefaturaObservacion(): ?string
    {
        return $this->solicitudEvaluarSolicitudJefaturaObservacion;
    }

    public function setSolicitudEvaluarSolicitudJefaturaObservacion(?string $solicitudEvaluarSolicitudJefaturaObservacion): self
    {
        $this->solicitudEvaluarSolicitudJefaturaObservacion = $solicitudEvaluarSolicitudJefaturaObservacion;

        return $this;
    }

    public function getSolicitudEvaluarSolicitudJefaturaUsuario(): ?string
    {
        return $this->solicitudEvaluarSolicitudJefaturaUsuario;
    }

    public function setSolicitudEvaluarSolicitudJefaturaUsuario(?string $solicitudEvaluarSolicitudJefaturaUsuario): self
    {
        $this->solicitudEvaluarSolicitudJefaturaUsuario = $solicitudEvaluarSolicitudJefaturaUsuario;

        return $this;
    }

    public function getSolicitudEvaluarSolicitudJefaturaFecha(): ?\DateTimeInterface
    {
        return $this->solicitudEvaluarSolicitudJefaturaFecha;
    }

    public function setSolicitudEvaluarSolicitudJefaturaFecha(?\DateTimeInterface $solicitudEvaluarSolicitudJefaturaFecha): self
    {
        $this->solicitudEvaluarSolicitudJefaturaFecha = $solicitudEvaluarSolicitudJefaturaFecha;

        return $this;
    }

    public function getSolicitudVerificarDisponibilidadPresupuestariaUsuario(): ?string
    {
        return $this->solicitudVerificarDisponibilidadPresupuestariaUsuario;
    }

    public function setSolicitudVerificarDisponibilidadPresupuestariaUsuario(?string $solicitudVerificarDisponibilidadPresupuestariaUsuario): self
    {
        $this->solicitudVerificarDisponibilidadPresupuestariaUsuario = $solicitudVerificarDisponibilidadPresupuestariaUsuario;

        return $this;
    }

    public function getSolicitudVerificarDisponibilidadPresupuestariaFecha(): ?\DateTimeInterface
    {
        return $this->solicitudVerificarDisponibilidadPresupuestariaFecha;
    }

    public function setSolicitudVerificarDisponibilidadPresupuestariaFecha(?\DateTimeInterface $solicitudVerificarDisponibilidadPresupuestariaFecha): self
    {
        $this->solicitudVerificarDisponibilidadPresupuestariaFecha = $solicitudVerificarDisponibilidadPresupuestariaFecha;

        return $this;
    }

    public function getSolicitudPreafectarId(): ?int
    {
        return $this->solicitudPreafectarId;
    }

    public function setSolicitudPreafectarId(?int $solicitudPreafectarId): self
    {
        $this->solicitudPreafectarId = $solicitudPreafectarId;

        return $this;
    }

    public function getSolicitudPreafectarFolio(): ?int
    {
        return $this->solicitudPreafectarFolio;
    }

    public function setSolicitudPreafectarFolio(?int $solicitudPreafectarFolio): self
    {
        $this->solicitudPreafectarFolio = $solicitudPreafectarFolio;

        return $this;
    }

    public function getSolicitudPreafectarImputacion(): ?string
    {
        return $this->solicitudPreafectarImputacion;
    }

    public function setSolicitudPreafectarImputacion(?string $solicitudPreafectarImputacion): self
    {
        $this->solicitudPreafectarImputacion = $solicitudPreafectarImputacion;

        return $this;
    }

    public function getSolicitudPreafectarMemo(): ?string
    {
        return $this->solicitudPreafectarMemo;
    }

    public function setSolicitudPreafectarMemo(?string $solicitudPreafectarMemo): self
    {
        $this->solicitudPreafectarMemo = $solicitudPreafectarMemo;

        return $this;
    }

    public function getSolicitudPreafectarObservacion(): ?string
    {
        return $this->solicitudPreafectarObservacion;
    }

    public function setSolicitudPreafectarObservacion(?string $solicitudPreafectarObservacion): self
    {
        $this->solicitudPreafectarObservacion = $solicitudPreafectarObservacion;

        return $this;
    }

    public function getSolicitudPreafectarUsuario(): ?string
    {
        return $this->solicitudPreafectarUsuario;
    }

    public function setSolicitudPreafectarUsuario(?string $solicitudPreafectarUsuario): self
    {
        $this->solicitudPreafectarUsuario = $solicitudPreafectarUsuario;

        return $this;
    }

    public function getSolicitudPreafectarFecha(): ?\DateTimeInterface
    {
        return $this->solicitudPreafectarFecha;
    }

    public function setSolicitudPreafectarFecha(?\DateTimeInterface $solicitudPreafectarFecha): self
    {
        $this->solicitudPreafectarFecha = $solicitudPreafectarFecha;

        return $this;
    }

    public function getSolicitudPreafectarPreafectacionStatus(): ?string
    {
        return $this->solicitudPreafectarPreafectacionStatus;
    }

    public function setSolicitudPreafectarPreafectacionStatus(?string $solicitudPreafectarPreafectacionStatus): self
    {
        $this->solicitudPreafectarPreafectacionStatus = $solicitudPreafectarPreafectacionStatus;

        return $this;
    }

    public function getCometidoNacional(): ?CometidoNacional
    {
        return $this->cometidoNacional;
    }

    public function setCometidoNacional(?CometidoNacional $cometidoNacional): self
    {
        $this->cometidoNacional = $cometidoNacional;

        return $this;
    }

    public function __toString()
    {
        return $this->getSolicitudEvaluarSolicitudJefaturaObservacion().' '.
                $this->getSolicitudEvaluarSolicitudJefaturaUsuario().' '.
                // $this->getSolicitudEvaluarSolicitudJefaturaFecha() != null ? $this->getSolicitudEvaluarSolicitudJefaturaFecha()->format('d/m/Y') : ''.' '.
                $this->getSolicitudVerificarDisponibilidadPresupuestariaObservacion().' '.
                $this->getSolicitudVerificarDisponibilidadPresupuestariaUsuario().' '.
                $this->getSolicitudVerificarDisponibilidadPresupuestariaFecha()->format('d/m/Y');
    }


}
