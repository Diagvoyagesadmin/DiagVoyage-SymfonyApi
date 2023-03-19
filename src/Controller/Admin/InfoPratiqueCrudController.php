<?php

namespace App\Controller\Admin;

use App\Entity\InfoPratique;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoPratiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoPratique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            DateTimeField::new('releaseAt'),
            AssociationField::new('pays'),
        ];
    }
    
}
