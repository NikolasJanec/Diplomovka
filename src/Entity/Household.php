<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseholdRepository")
 */
class Household
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
     * @ORM\Column(name="hou_description",type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="hou_uuid",type="string", length=36, nullable=true)
     */
    private $uuid;

    /**
     * @ORM\Column(name="hou_public_key",type="string", length=1000)
     */
    private $publicKey;

    /**
     * @ORM\Column(name="hou_private_key",type="string", length=1000)
     */
    private $privateKey;

    /**
     * @ORM\Column(name="hou_ip_address",type="string", length=100)
     */
    private $ipAddress;

    /**
 * @ORM\Column(name="hou_gps_longitude",type="string", length=100, nullable=true)
 */
    private $gpsLongitude;

    /**
     * @ORM\Column(name="hou_gps_latitude",type="string", length=100, nullable=true)
     */
    private $gpsLatitude;

    /**
     * @ORM\Column(name="hou_port_number",type="string", length=100, nullable=true)
     */
    private $portNumber;

    /**
     * @ORM\Column(name="hou_last_sync_at",type="datetime")
     */
    private $lastSyncAt;

    /**
     * @ORM\Column(name="hou_created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="hou_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sensor", mappedBy="household")
     */
    private $sensors;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActiveMember", mappedBy="household")
     */
    private $activeMembers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rule", mappedBy="household")
     */
    private $rules;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="household")
     */
    private $logs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserPermission", mappedBy="household")
     */
    private $userPermissions;

    public function __construct()
    {
        $this->sensors = new ArrayCollection();
        $this->activeMembers = new ArrayCollection();
        $this->rules = new ArrayCollection();
        $this->logs = new ArrayCollection();
        $this->userPermissions = new ArrayCollection();
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
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid($uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param mixed $publicKey
     */
    public function setPublicKey($publicKey): void
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param mixed $privateKey
     */
    public function setPrivateKey($privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     */
    public function setIpAddress($ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return mixed
     */
    public function getPortNumber()
    {
        return $this->portNumber;
    }

    /**
     * @param mixed $portNumber
     */
    public function setPortNumber($portNumber): void
    {
        $this->portNumber = $portNumber;
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

    public function fillCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }
    public function fillUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
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
            $sensor->setHousehold($this);
        }

        return $this;
    }

    public function removeSensor(Sensor $sensor): self
    {
        if ($this->sensors->contains($sensor)) {
            $this->sensors->removeElement($sensor);
            // set the owning side to null (unless already changed)
            if ($sensor->getHousehold() === $this) {
                $sensor->setHousehold(null);
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
            $activeMember->setHousehold($this);
        }

        return $this;
    }

    public function removeActiveMember(ActiveMember $activeMember): self
    {
        if ($this->activeMembers->contains($activeMember)) {
            $this->activeMembers->removeElement($activeMember);
            // set the owning side to null (unless already changed)
            if ($activeMember->getHousehold() === $this) {
                $activeMember->setHousehold(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rule[]
     */
    public function getRules(): Collection
    {
        return $this->rules;
    }

    public function addRule(Rule $rule): self
    {
        if (!$this->rules->contains($rule)) {
            $this->rules[] = $rule;
            $rule->setHousehold($this);
        }

        return $this;
    }

    public function removeRule(Rule $rule): self
    {
        if ($this->rules->contains($rule)) {
            $this->rules->removeElement($rule);
            // set the owning side to null (unless already changed)
            if ($rule->getHousehold() === $this) {
                $rule->setHousehold(null);
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
            $log->setHousehold($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getHousehold() === $this) {
                $log->setHousehold(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserPermission[]
     */
    public function getUserPermissions(): Collection
    {
        return $this->userPermissions;
    }

    public function addUserPermission(UserPermission $userPermission): self
    {
        if (!$this->userPermissions->contains($userPermission)) {
            $this->userPermissions[] = $userPermission;
            $userPermission->setHousehold($this);
        }

        return $this;
    }

    public function removeUserPermission(UserPermission $userPermission): self
    {
        if ($this->userPermissions->contains($userPermission)) {
            $this->userPermissions->removeElement($userPermission);
            // set the owning side to null (unless already changed)
            if ($userPermission->getHousehold() === $this) {
                $userPermission->setHousehold(null);
            }
        }

        return $this;
    }






}
