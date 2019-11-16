<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiveMemberRepository")
 */
class ActiveMember
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
     * @ORM\Column(name="acm_description",type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="acm_is_active",type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="acm_last_sync_at",type="datetime")
     */
    private $lastSyncAt;

    /**
     * @ORM\Column(name="acm_created_at",type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="acm_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Household", inversedBy="activeMembers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $household;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group", inversedBy="activeMembers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="active_member")
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
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
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
            $log->setActiveMember($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getActiveMember() === $this) {
                $log->setActiveMember(null);
            }
        }

        return $this;
    }

    public function fillCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }
    public function fillUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }


}
