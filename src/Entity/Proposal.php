<?php

namespace App\Entity;

use App\Repository\ProposalRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=ProposalRepository::class)
 * @Vich\Uploadable
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
     * @var string | null
     */
    private $picture;
    /**
     * @Vich\UploadableField(mapping="proposal_pictures", fileNameProperty="picture")
     * @var File | null
     */
    private $pictureFile;
   

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="proposals", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
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

    /**
     * @ORM\ManyToOne(targetEntity=Course::class)
     */
    private $courses;

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

    
    public function setPictureFile(?File $pictureFile = null):void
    {
        $this->pictureFile = $pictureFile;
        if(null!== $pictureFile){
            $this ->updatedAt = new \DateTime('now');
        }
    }

    public function getPictureFile():?File
    {
        return $this->pictureFile;
    }

    public function setPicture(?string $picture):void
    {
        $this->picture = $picture;
    }

    public function getPicture():?string
    {
        return $this->picture;
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
    public function __toString():string
    {
        return $this->content;
    }

    public function getCourses(): ?Course
    {
        return $this->courses;
    }

    public function setCourses(?Course $courses): self
    {
        $this->courses = $courses;

        return $this;
    }
}
