<?php

namespace App\Entity;

use App\Repository\SeedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeedRepository::class)
 */
class Seed
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
    private $seedPicture;

    /**
     * @ORM\OneToOne(targetEntity=Tree::class, mappedBy="seedphoto", cascade={"persist", "remove"})
     */
    private $tree;

    /**
     * @ORM\OneToOne(targetEntity=Result::class, mappedBy="seedPlug", cascade={"persist", "remove"})
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

    public function getSeedPicture(): ?string
    {
        return $this->seedPicture;
    }

    public function setSeedPicture(string $seedPicture): self
    {
        $this->seedPicture = $seedPicture;

        return $this;
    }

    public function getTree(): ?Tree
    {
        return $this->tree;
    }

    public function setTree(Tree $tree): self
    {
        // set the owning side of the relation if necessary
        if ($tree->getSeedphoto() !== $this) {
            $tree->setSeedphoto($this);
        }

        $this->tree = $tree;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(Result $result): self
    {
        // set the owning side of the relation if necessary
        if ($result->getSeedPlug() !== $this) {
            $result->setSeedPlug($this);
        }

        $this->result = $result;

        return $this;
    }
}
