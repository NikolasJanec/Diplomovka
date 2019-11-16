<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="usr_first_name",type="string", length=100)
     */
    private $first_name;
    /**
     * @ORM\Column(name="usr_last_name",type="string", length=100)
     */
    private $last_name;
    /**
     * @ORM\Column(name="usr_uuid",type="string", length=36)
     */
    private $uuid;
    /**
     * @ORM\Column(name="usr_email",type="string", length=100)
     */
    private $email;
    /**
     * @ORM\Column(name="usr_password",type="string", length=100)
     */
    private $password;
    /**
     * @ORM\Column(name="usr_created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="usr_updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rule", mappedBy="user", orphanRemoval=true)
     */
    private $rules;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MobileDevice", mappedBy="user", orphanRemoval=true)
     */
    private $mobileDevices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="user", orphanRemoval=true)
     */
    private $logs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserPermission", mappedBy="user")
     */
    private $userPermissions;

    public function __construct()
    {
        $this->rules = new ArrayCollection();
        $this->mobileDevices = new ArrayCollection();
        $this->logs = new ArrayCollection();
        $this->userPermissions = new ArrayCollection();
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
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
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

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
            $rule->setUser($this);
        }

        return $this;
    }

    public function removeRule(Rule $rule): self
    {
        if ($this->rules->contains($rule)) {
            $this->rules->removeElement($rule);
            // set the owning side to null (unless already changed)
            if ($rule->getUser() === $this) {
                $rule->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MobileDevice[]
     */
    public function getMobileDevices(): Collection
    {
        return $this->mobileDevices;
    }

    public function addMobileDevice(MobileDevice $mobileDevice): self
    {
        if (!$this->mobileDevices->contains($mobileDevice)) {
            $this->mobileDevices[] = $mobileDevice;
            $mobileDevice->setUser($this);
        }

        return $this;
    }

    public function removeMobileDevice(MobileDevice $mobileDevice): self
    {
        if ($this->mobileDevices->contains($mobileDevice)) {
            $this->mobileDevices->removeElement($mobileDevice);
            // set the owning side to null (unless already changed)
            if ($mobileDevice->getUser() === $this) {
                $mobileDevice->setUser(null);
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
            $log->setUser($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getUser() === $this) {
                $log->setUser(null);
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
            $userPermission->setUser($this);
        }

        return $this;
    }

    public function removeUserPermission(UserPermission $userPermission): self
    {
        if ($this->userPermissions->contains($userPermission)) {
            $this->userPermissions->removeElement($userPermission);
            // set the owning side to null (unless already changed)
            if ($userPermission->getUser() === $this) {
                $userPermission->setUser(null);
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
