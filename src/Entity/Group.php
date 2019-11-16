<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 */
class Group
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
     * @ORM\Column(name="grp_description",type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="grp_created_at",type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="grp_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sensor", mappedBy="unit")
     */
    private $sensors;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActiveMember", mappedBy="unit")
     */
    private $activeMembers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="unit")
     */
    private $logs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", mappedBy="groups")
     */
    private $roles;

    public function __construct()
    {
        $this->sensors = new ArrayCollection();
        $this->activeMembers = new ArrayCollection();
        $this->logs = new ArrayCollection();
        $this->roles = new ArrayCollection();
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

    /**
     * @return Collection|Sensor[]
     */
    public function getSensors(): Collection
    {
        return $this->sensors;
    }

    public function addSensor(Sensor $sensor): self
    {
        if (!$this->sensors->contains($sensor)) {
            $this->sensors[] = $sensor;
            $sensor->setUnit($this);
        }

        return $this;
    }

    public function removeSensor(Sensor $sensor): self
    {
        if ($this->sensors->contains($sensor)) {
            $this->sensors->removeElement($sensor);
            // set the owning side to null (unless already changed)
            if ($sensor->getUnit() === $this) {
                $sensor->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ActiveMember[]
     */
    public function getActiveMembers(): Collection
    {
        return $this->activeMembers;
    }

    public function addActiveMember(ActiveMember $activeMember): self
    {
        if (!$this->activeMembers->contains($activeMember)) {
            $this->activeMembers[] = $activeMember;
            $activeMember->setUnit($this);
        }

        return $this;
    }

    public function removeActiveMember(ActiveMember $activeMember): self
    {
        if ($this->activeMembers->contains($activeMember)) {
            $this->activeMembers->removeElement($activeMember);
            // set the owning side to null (unless already changed)
            if ($activeMember->getUnit() === $this) {
                $activeMember->setUnit(null);
            }
        }

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
            $log->setUnit($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getUnit() === $this) {
                $log->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->addGroup($this);
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
            $role->removeGroup($this);
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
