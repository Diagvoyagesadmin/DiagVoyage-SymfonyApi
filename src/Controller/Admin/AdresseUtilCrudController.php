<?php

namespace App\Controller\Admin;

use App\Entity\AdresseUtil;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdresseUtilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdresseUtil::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
            TextEditorField::new('description'),
            TextField::new('type'),
            TextField::new('adresse'),
            TextField::new('ville'),
            TextField::new('tel'),
            TextField::new('lat'),
            TextField::new('lon')
        ];
    }
    
}
