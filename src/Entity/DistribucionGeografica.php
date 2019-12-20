<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DistribucionGeografica
 *
 * @ORM\Table(name="distribucion_geografica")
 * @ORM\Entity
 */
class DistribucionGeografica
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion_geografica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="region", type="integer", nullable=true)
     */
    private $region;

    /**
     * @var int|null
     *
     * @ORM\Column(name="provincia", type="integer", nullable=true)
     */
    private $provincia;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comuna", type="integer", nullable=true)
     */
    private $comuna;

    /**
     * @var string|null
     *
     * @ORM\Column(name="glosa", type="string", length=255, nullable=true)
     */
    private $glosa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estadoregistro", type="boolean", nullable=true)
     */
    private $estadoregistro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?int
    {
        return $this->region;
    }

    public function setRegion(?int $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getProvincia(): ?int
    {
        return $this->provincia;
    }

    public function setProvincia(?int $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getComuna(): ?int
    {
        return $this->comuna;
    }

    public function setComuna(?int $comuna): self
    {
        $this->comuna = $comuna;

        return $this;
    }

    public function getGlosa(): ?string
    {
        return $this->glosa;
    }

    public function setGlosa(?string $glosa): self
    {
        $this->glosa = $glosa;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getEstadoregistro(): ?bool
    {
        return $this->estadoregistro;
    }

    public function setEstadoregistro(?bool $estadoregistro): self
    {
        $this->estadoregistro = $estadoregistro;

        return $this;
    }


}
