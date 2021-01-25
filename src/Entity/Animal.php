<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $animalPicture;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $footprintPicture;

    /**
     * @ORM\OneToOne(targetEntity=Result::class, mappedBy="animalplug", cascade={"persist", "remove"})
     */
    private $result;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAnimalPicture(): ?string
    {
        return $this->animalPicture;
    }

    public function setAnimalPicture(string $animalPicture): self
    {
        $this->animalPicture = $animalPicture;

        return $this;
    }

    public function getFootprintPicture(): ?string
    {
        return $this->footprintPicture;
    }

    public function setFootprintPicture(string $footprintPicture): self
    {
        $this->footprintPicture = $footprintPicture;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(Result $result): self
    {
        // set the owning side of the relation if necessary
        if ($result->getAnimalplug() !== $this) {
            $result->setAnimalplug($this);
        }

        $this->result = $result;

        return $this;
    }
}
