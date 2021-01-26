<?php

namespace App\Entity;

use App\Repository\ProposalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposalRepository::class)
 */
class Proposal
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
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\OneToOne(targetEntity=Question::class, inversedBy="proposals", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $nextStep;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="nextProposals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $step;

    /**
     * @ORM\ManyToOne(targetEntity=Result::class, inversedBy="resultProposal")
     * @ORM\JoinColumn(nullable=true)
     */
    private $finalResult;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getNextStep(): ?Question
    {
        return $this->nextStep;
    }

    public function setNextStep(Question $nextStep): self
    {
        $this->nextStep = $nextStep;

        return $this;
    }

    public function getStep(): ?Question
    {
        return $this->step;
    }

    public function setStep(?Question $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getFinalResult(): ?Result
    {
        return $this->finalResult;
    }

    public function setFinalResult(Result $finalResult): self
    {
        $this->finalResult = $finalResult;

        return $this;
    }
}
