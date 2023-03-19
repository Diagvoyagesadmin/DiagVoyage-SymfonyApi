<?php

namespace App\Controller\Admin;

use App\Entity\Vaccin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VaccinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vaccin::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            NumberField::new('prix'),
            DateTimeField::new('releaseAt'),
            AssociationField::new('pays'),
            AssociationField::new('centres'),
        ];
    }
    
}
