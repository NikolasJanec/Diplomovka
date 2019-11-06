<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SensorRepository")
 */
class Sensor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(name="sen_description",type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="sen_last_sync_at",type="datetime")
     */
    private $lastSyncAt;

    /**
     * @ORM\Column(name="sen_created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="sen_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Household", inversedBy="sensors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $household;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group", inversedBy="sensors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="sensor")
     */
    private $logs;

    public function __construct()
    {
        $this->logs = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLastSyncAt()
    {
        return $this->lastSyncAt;
    }

    /**
     * @param mixed $lastSyncAt
     */
    public function setLastSyncAt($lastSyncAt): void
    {
        $this->lastSyncAt = $lastSyncAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getHousehold(): ?Household
    {
        return $this->household;
    }

    public function setHousehold(?Household $household): self
    {
        $this->household = $household;

        return $this;
    }

    public function getUnit(): ?Group
    {
        return $this->unit;
    }

    public function setUnit(?Group $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return Collection|Log[]
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(Log $log): self
    {
        if (!$this->logs->contains($log)) {
            $this->logs[] = $log;
            $log->setSensor($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getSensor() === $this) {
                $log->setSensor(null);
            }
        }

        return $this;
    }


}
