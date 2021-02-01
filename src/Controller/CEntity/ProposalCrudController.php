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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

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
           
            
            
            TextField::new('content'),
            $pictureFile=TextareaField::new('pictureFile')->setFormType(VichImageType::class)->setLabel('Image'),
         
            AssociationField::new('nextStep', label:'Etapes'),
            AssociationField::new('finalResult', label:'Fiche Résultat'),
            AssociationField::new('step', label:'Etape Suivante'),
           
            
            
        ];
    }
    
}
