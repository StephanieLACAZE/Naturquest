<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ResultRepository::class)
 * @Vich\Uploadable
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
    private $resultName;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string | null
     */
    private $resultPhoto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string | null
     */
    private $photoSpecies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string | null
     */
    private $photoMore;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string | null
     */
    private $photoComplementary;

    /**
     * @Vich\UploadableField(mapping="result_photo", fileNameProperty="resultPhoto")
     * @var File | null
     */
    private $resultPhotoFile;
    /**
     * @Vich\UploadableField(mapping="result_species", fileNameProperty="photoSpecies")
     * @var File | null
     */
    private $photoSpeciesFile;
    /**
     * @Vich\UploadableField(mapping="result_more", fileNameProperty="photoMore")
     * @var File | null
     */
    private $photoMoreFile;
    /**
     * @Vich\UploadableField(mapping="result_complementary", fileNameProperty="photoComplementary")
     * @var File | null
     */
    private $photoComplementaryFile;
   
   
   
    

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

      
    public function getResultName(): ?string
    {
        return $this->resultName;
    }

    public function setResultName(string $resultName): self
    {
        $this->resultName = $resultName;

        return $this;
    }

    public function setResultPhotoFile(?File $resultPhotoFile = null):void
    {
        $this->resultPhotoFile = $resultPhotoFile;
        if(null!== $resultPhotoFile){
            $this ->updatedAt = new \DateTime('now');
        }
    }

    public function getResultPhotoFile():?File
    {
        return $this->resultPhotoFile;
    }

    public function setResultPhoto(?string $resultPhoto):void
    {
        $this->resultPhoto = $resultPhoto;
    }

    public function getResultPhoto():?string
    {
        return $this->resultPhoto;
    }


    public function setPhotoSpeciesFile(?File $photoSpeciesFile = null):void
    {
        $this->photoSpeciesFile = $photoSpeciesFile;
        if(null!== $photoSpeciesFile){
            $this ->updatedAt = new \DateTime('now');
        }
    }

    public function getPhotoSpeciesFile():?File
    {
        return $this->photoSpeciesFile;
    }

    public function setPhotoSpecies(?string $photoSpecies):void
    {
        $this->photoSpecies = $photoSpecies;
    }

    public function getPhotoSpecies():?string
    {
        return $this->photoSpecies;
    }


    public function setPhotoMoreFile(?File $photoMoreFile = null):void
    {
        $this->photoMoreFile = $photoMoreFile;
        if(null!== $photoMoreFile){
            $this ->updatedAt = new \DateTime('now');
        }
    }

    public function getPhotoMoreFile():?File
    {
        return $this->photoMoreFile;
    }

    public function setPhotoMore(?string $photoMore):void
    {
        $this->photoMore = $photoMore;
    }

    public function getPhotoMore():?string
    {
        return $this->photoMore;
    }

    public function setPhotoComplementaryFile(?File $photoComplementaryFile = null):void
    {
        $this->photoComplementaryFile = $photoComplementaryFile;
        if(null!== $photoComplementaryFile){
            $this ->updatedAt = new \DateTime('now');
        }
    }

    public function getPhotoComplementaryFile():?File
    {
        return $this->photoComplementaryFile;
    }

    public function setPhotoComplementary(?string $photoComplementary):void
    {
        $this->photoComplementary = $photoComplementary;
    }

    public function getPhotoComplementary():?string
    {
        return $this->photoComplementary;
    }


    public function __toString():string
    {
        return $this->name;
    }
}


