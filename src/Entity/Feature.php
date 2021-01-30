<?php

namespace App\Entity;

use App\Repository\FeatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeatureRepository::class)
 */
class Feature
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
     * @ORM\Column(type="string", length=255, nullable=true )
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity=Result::class, inversedBy="features")
     */
    private $result;

    public function __construct()
    {
        $this->result = new ArrayCollection();
    }

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|Result[]
     */
    public function getResult(): Collection
    {
        return $this->result;
    }

    public function addResult(Result $result): self
    {
        if (!$this->result->contains($result)) {
            $this->result[] = $result;
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        $this->result->removeElement($result);

        return $this;
    }
    public function __toString():string
    {
        return $this->name;
    }
}
