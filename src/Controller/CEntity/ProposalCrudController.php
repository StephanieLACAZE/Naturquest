<?php

namespace App\Controller\CEntity;

use App\Entity\Proposal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProposalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proposal::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            IdField::new('step'),
            IdField::new('nextStep'),
            IdField::new('finalResult'),
            TextEditorField::new('content'),
            $pictureFile=TextareaField::new('pictureFile')->setFormType(VichImageType::class)->setLabel('Image'),
         
        ];
    }
    
}
