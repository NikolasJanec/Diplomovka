<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LogRepository")
 */
class Log
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
     * @ORM\Column(name="log_status",type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(name="log_activity",type="string", length=100, nullable=true)
     */
    private $activity;

    /**
     * @ORM\Column(name="log_message",type="string", length=100, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(name="log_values",type="string", length=255, nullable=true)
     */
    private $values;

    /**
     * @ORM\Column(name="log_additional_info",type="string", length=255, nullable=true)
     */
    private $addInfo;

    /**
     * @ORM\Column(name="log_gps_longitude",type="string", length=100, nullable=true)
     */
    private $gpsLongitude;

    /**
     * @ORM\Column(name="log_gps_latitude",type="string", length=100, nullable=true)
     */
    private $gpsLatitude;

    /**
     * @ORM\Column(name="log_created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="log_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sensor", inversedBy="logs")
     */
    private $sensor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Household", inversedBy="logs")
     */
    private $household;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="logs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rule", inversedBy="logs")
     */
    private $rule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActiveMember", inversedBy="logs")
     */
    private $active_member;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group", inversedBy="logs")
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MobileDevice", inversedBy="logs")
     */
    private $mobile_device;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeLog", inversedBy="logs")
     */
    private $type_log;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="logs")
     */
    private $role;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity): void
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     */
    public function setValues($values): void
    {
        $this->values = $values;
    }

    /**
     * @return mixed
     */
    public function getAddInfo()
    {
        return $this->addInfo;
    }

    /**
     * @param mixed $addInfo
     */
    public function setAddInfo($addInfo): void
    {
        $this->addInfo = $addInfo;
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

    public function getSensor(): ?Sensor
    {
        return $this->sensor;
    }

    public function setSensor(?Sensor $sensor): self
    {
        $this->sensor = $sensor;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRule(): ?Rule
    {
        return $this->rule;
    }

    public function setRule(?Rule $rule): self
    {
        $this->rule = $rule;

        return $this;
    }

    public function getActiveMember(): ?ActiveMember
    {
        return $this->active_member;
    }

    public function setActiveMember(?ActiveMember $active_member): self
    {
        $this->active_member = $active_member;

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

    public function getMobileDevice(): ?MobileDevice
    {
        return $this->mobile_device;
    }

    public function setMobileDevice(?MobileDevice $mobile_device): self
    {
        $this->mobile_device = $mobile_device;

        return $this;
    }

    public function getTypeLog(): ?TypeLog
    {
        return $this->type_log;
    }

    public function setTypeLog(?TypeLog $type_log): self
    {
        $this->type_log = $type_log;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }



}
