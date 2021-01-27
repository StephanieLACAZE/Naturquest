<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Proposal::class, mappedBy="step")
     */
    private $nextProposals;

    public function __construct()
    {
        $this->nextProposals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

   
      
    /**
     * @return Collection|Proposal[]
     */
    public function getNextProposals(): Collection
    {
        return $this->nextProposals;
    }

    public function addNextProposal(Proposal $nextProposal): self
    {
        if (!$this->nextProposals->contains($nextProposal)) {
            $this->nextProposals[] = $nextProposal;
            $nextProposal->setStep($this);
        }

        return $this;
    }

    public function removeNextProposal(Proposal $nextProposal): self
    {
        if ($this->nextProposals->removeElement($nextProposal)) {
            // set the owning side to null (unless already changed)
            if ($nextProposal->getStep() === $this) {
                $nextProposal->setStep(null);
            }
        }

        return $this;
    }
    

}
