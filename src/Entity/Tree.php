<?php

namespace App\Entity;

use App\Repository\TreeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TreeRepository::class)
 */
class Tree
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
    private $treePhoto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $leafPhoto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BarkPhoto;


    /**
     * @ORM\OneToOne(targetEntity=Seed::class, inversedBy="tree", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $seedphoto;

    /**
     * @ORM\ManyToOne(targetEntity=Result::class, inversedBy="treePlug")
     * @ORM\JoinColumn(nullable=false)
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

    public function getTreePhoto(): ?string
    {
        return $this->treePhoto;
    }

    public function setTreePhoto(string $treePhoto): self
    {
        $this->treePhoto = $treePhoto;

        return $this;
    }

    public function getLeafPhoto(): ?string
    {
        return $this->leafPhoto;
    }

    public function setLeafPhoto(string $leafPhoto): self
    {
        $this->leafPhoto = $leafPhoto;

        return $this;
    }

    public function getBarkPhoto(): ?string
    {
        return $this->BarkPhoto;
    }

    public function setBarkPhoto(string $BarkPhoto): self
    {
        $this->BarkPhoto = $BarkPhoto;

        return $this;
    }

    public function getSeedPhoto(): ?string
    {
        return $this->seedPhoto;
    }

    public function setSeedPhoto(string $seedPhoto): self
    {
        $this->seedPhoto = $seedPhoto;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(?Result $result): self
    {
        $this->result = $result;

        return $this;
    }
}
