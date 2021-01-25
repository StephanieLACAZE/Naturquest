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
     * @ORM\OneToOne(targetEntity=Animal::class, inversedBy="result", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $animalplug;

    /**
     * @ORM\OneToMany(targetEntity=Tree::class, mappedBy="result", orphanRemoval=true)
     */
    private $treePlug;

    /**
     * @ORM\OneToOne(targetEntity=Seed::class, inversedBy="result", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $seedPlug;

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

    public function getAnimalplug(): ?Animal
    {
        return $this->animalplug;
    }

    public function setAnimalplug(Animal $animalplug): self
    {
        $this->animalplug = $animalplug;

        return $this;
    }

    /**
     * @return Collection|Tree[]
     */
    public function getTreePlug(): Collection
    {
        return $this->treePlug;
    }

    public function addTreePlug(Tree $treePlug): self
    {
        if (!$this->treePlug->contains($treePlug)) {
            $this->treePlug[] = $treePlug;
            $treePlug->setResult($this);
        }

        return $this;
    }

    public function removeTreePlug(Tree $treePlug): self
    {
        if ($this->treePlug->removeElement($treePlug)) {
            // set the owning side to null (unless already changed)
            if ($treePlug->getResult() === $this) {
                $treePlug->setResult(null);
            }
        }

        return $this;
    }

    public function getSeedPlug(): ?Seed
    {
        return $this->seedPlug;
    }

    public function setSeedPlug(Seed $seedPlug): self
    {
        $this->seedPlug = $seedPlug;

        return $this;
    }
}
