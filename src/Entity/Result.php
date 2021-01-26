<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultRepository::class)
 */
class Result
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
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subText;

    /**
     * @ORM\OneToMany(targetEntity=Proposal::class, mappedBy="finalResult", cascade={"persist", "remove"})
     */
    private $resultProposal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultPhoto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoSpecies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoMore;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoComplementary;

    

    public function __construct()
    {
        $this->treePlug = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSubText(): ?string
    {
        return $this->subText;
    }

    public function setSubText(string $subText): self
    {
        $this->subText = $subText;

        return $this;
    }

    public function getResultProposal(): ?Proposal
    {
        return $this->resultProposal;
    }

    public function setResultProposal(Proposal $resultProposal): self
    {
        // set the owning side of the relation if necessary
        if ($resultProposal->getFinalResult() !== $this) {
            $resultProposal->setFinalResult($this);
        }

        $this->resultProposal = $resultProposal;

        return $this;
    }

    public function getResultName(): ?string
    {
        return $this->resultName;
    }

    public function setResultName(string $resultName): self
    {
        $this->resultName = $resultName;

        return $this;
    }

    public function getResultPhoto(): ?string
    {
        return $this->resultPhoto;
    }

    public function setResultPhoto(string $resultPhoto): self
    {
        $this->resultPhoto = $resultPhoto;

        return $this;
    }

    public function getPhotoSpecies(): ?string
    {
        return $this->photoSpecies;
    }

    public function setPhotoSpecies(?string $photoSpecies): self
    {
        $this->photoSpecies = $photoSpecies;

        return $this;
    }

    public function getPhotoMore(): ?string
    {
        return $this->photoMore;
    }

    public function setPhotoMore(?string $photoMore): self
    {
        $this->photoMore = $photoMore;

        return $this;
    }

    public function getPhotoComplementary(): ?string
    {
        return $this->photoComplementary;
    }

    public function setPhotoComplementary(?string $photoComplementary): self
    {
        $this->photoComplementary = $photoComplementary;

        return $this;
    }            
            
        }
