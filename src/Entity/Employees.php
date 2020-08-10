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
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="employee_id")
     */
    private $id;

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
     * @ORM\Column(type="datetime", name="date_of_birth")
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
     * @ORM\Column(type="string", length=255, name="junk")
     */
    private $junk;

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

    public function getDateOfBirth()//: ?\DateTime
    {
        if ($this->dateOfBirth !== null)
            return $this->dateOfBirth->format('Y-m-d');
        else
            return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTime $dateOfBirth): self
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

}
