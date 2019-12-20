<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CometidoNacional
 *
 * @ORM\Table(name="cometido_nacional", indexes={@ORM\Index(name="IDX_A1C55EB06A540E", columns={"id_estado"})})
 * @ORM\Entity
 */
class CometidoNacional
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cometido_nacional_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_caso", type="integer", nullable=true)
     */
    private $idCaso;

    /**
     * @var string
     *
     * @ORM\Column(name="rut", type="string", length=12, nullable=false, options={"fixed"=true})
     */
    private $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="text", nullable=false)
     */
    private $motivo;

    /**
     * @var bool
     *
     * @ORM\Column(name="pasaje_aereo", type="boolean", nullable=false)
     */
    private $pasajeAereo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_envio", type="datetime", nullable=true)
     */
    private $fechaEnvio;

    /**
     * @var \CometidoEstados
     *
     * @ORM\ManyToOne(targetEntity="CometidoEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    private $idEstado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TipoGastosCometidos", inversedBy="idCometido")
     * @ORM\JoinTable(name="cometido_nacional_gastos",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_cometido", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_tipo_gasto", referencedColumnName="id_tipo")
     *   }
     * )
     */
    private $idTipoGasto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTipoGasto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCaso(): ?int
    {
        return $this->idCaso;
    }

    public function setIdCaso(?int $idCaso): self
    {
        $this->idCaso = $idCaso;

        return $this;
    }

    public function getRut(): ?string
    {
        return $this->rut;
    }

    public function setRut(string $rut): self
    {
        $this->rut = $rut;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(string $motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getPasajeAereo(): ?bool
    {
        return $this->pasajeAereo;
    }

    public function setPasajeAereo(bool $pasajeAereo): self
    {
        $this->pasajeAereo = $pasajeAereo;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getFechaModificacion(): ?\DateTimeInterface
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(?\DateTimeInterface $fechaModificacion): self
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    public function getFechaEnvio(): ?\DateTimeInterface
    {
        return $this->fechaEnvio;
    }

    public function setFechaEnvio(?\DateTimeInterface $fechaEnvio): self
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    public function getIdEstado(): ?CometidoEstados
    {
        return $this->idEstado;
    }

    public function setIdEstado(?CometidoEstados $idEstado): self
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * @return Collection|TipoGastosCometidos[]
     */
    public function getIdTipoGasto(): Collection
    {
        return $this->idTipoGasto;
    }

    public function addIdTipoGasto(TipoGastosCometidos $idTipoGasto): self
    {
        if (!$this->idTipoGasto->contains($idTipoGasto)) {
            $this->idTipoGasto[] = $idTipoGasto;
        }

        return $this;
    }

    public function removeIdTipoGasto(TipoGastosCometidos $idTipoGasto): self
    {
        if ($this->idTipoGasto->contains($idTipoGasto)) {
            $this->idTipoGasto->removeElement($idTipoGasto);
        }

        return $this;
    }

}
