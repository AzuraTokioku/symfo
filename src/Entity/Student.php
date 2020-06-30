<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Birthyear;

    /**
     * @ORM\ManyToOne(targetEntity=SchoolYear::class, inversedBy="student")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schoolYear;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="students")
     */
    private $studentTag;


    public function __construct()
    {
        $this->studentTags = new ArrayCollection();
        $this->studentTag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function getBirthyear(): ?int
    {
        return $this->Birthyear;
    }

    public function setBirthyear(?int $Birthyear): self
    {
        $this->Birthyear = $Birthyear;

        return $this;
    }

    public function getSchoolYear(): ?SchoolYear
    {
        return $this->schoolYear;
    }

    public function setSchoolYear(?SchoolYear $schoolYear): self
    {
        $this->schoolYear = $schoolYear;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getStudentTag(): Collection
    {
        return $this->studentTag;
    }

    public function addStudentTag(Tag $studentTag): self
    {
        if (!$this->studentTag->contains($studentTag)) {
            $this->studentTag[] = $studentTag;
            $studentTag->addStudent($this);
        }

        return $this;
    }

    public function removeStudentTag(Tag $studentTag): self
    {
        if ($this->studentTag->contains($studentTag)) {
            $this->studentTag->removeElement($studentTag);
            $studentTag->removeStudent($this);
        }

        return $this;
    }

}
