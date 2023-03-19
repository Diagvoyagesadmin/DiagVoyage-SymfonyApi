<?php

namespace App\Controller\Admin;

use App\Entity\AchatConseille;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AchatConseilleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AchatConseille::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('prixMoyen'),
            TextField::new('url'),
            AssociationField::new('pays'),
        ];
        
    }
    
}
