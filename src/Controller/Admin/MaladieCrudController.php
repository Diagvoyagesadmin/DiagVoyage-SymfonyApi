<?php

namespace App\Controller\Admin;

use App\Entity\Maladie;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MaladieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Maladie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            TextField::new('mode_contamination'),
            AssociationField::new('pays'),
            AssociationField::new('symptomes'),
            AssociationField::new('centres'),
        ];
    }
    
}
