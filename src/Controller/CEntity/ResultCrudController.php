<?php

namespace App\Controller\CEntity;

use App\Entity\Result;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ResultCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Result::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            
            IdField::new('resultName'),
            TextEditorField::new('text'),
            $pictureFile=TextareaField::new('resultPhotoFile')->setFormType(VichImageType::class)->setLabel('Image'),
            $pictureFile=TextareaField::new('photoSpeciesFile')->setFormType(VichImageType::class)->setLabel('Image'),
            $pictureFile=TextareaField::new('photoMoreFile')->setFormType(VichImageType::class)->setLabel('Image'),
            $pictureFile=TextareaField::new('photoComplementaryFile')->setFormType(VichImageType::class)->setLabel('Image'),
         
        ];
    }
    
}
