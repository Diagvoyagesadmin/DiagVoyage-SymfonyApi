<?php

namespace App\Controller\Admin;

use App\Entity\Symptome;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SymptomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Symptome::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            AssociationField::new('maladies'),
        ];
    }
    
}
