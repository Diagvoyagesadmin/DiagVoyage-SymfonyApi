<?php

namespace App\Controller\Admin;

use App\Entity\Centre;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CentreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Centre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('adresse'),
            TextField::new('ville'),
            TextField::new('cp'),
            NumberField::new('lat'),
            NumberField::new('lon'),
            TextField::new('type'),
            AssociationField::new('maladies'),
            AssociationField::new('vaccins'),
        ];
    }
    
}
