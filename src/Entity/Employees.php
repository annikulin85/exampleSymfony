<?php

namespace App\Entity;

use App\Repository\EmployeesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployeesRepository::class)
 */
class Employees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="employee_id")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", name="subsidiary_id")
     */
    private $subsidiaryId;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", length=255, name="first_name")
     */
    private $firstName;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", length=255, name="last_name")
     */
    private $lastName;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="date", name="date_of_birth")
     */
    private $dateOfBirth;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", length=255, name="phone_number")
     */
    private $phoneNumber;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", length=255)
     */
    private $junk;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", length=255, name="last_name_up")
     */
    private $lastNameUp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getJunk(): ?string
    {
        return $this->junk;
    }

    public function setJunk(string $junk): self
    {
        $this->junk = $junk;

        return $this;
    }

    public function getLastNameUp(): ?string
    {
        return $this->lastNameUp;
    }

    public function setLastNameUp(string $lastNameUp): self
    {
        $this->lastNameUp = $lastNameUp;

        return $this;
    }

    public function getSubsidiaryId(): ?int
    {
        return $this->subsidiaryId;
    }

    public function setSubsidiaryId(int $subsidiaryId): self
    {
        $this->subsidiaryId = $subsidiaryId;

        return $this;
    }
}
