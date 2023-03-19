<?php

namespace App\Controller\Admin;

use App\Entity\InfoPratique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoPratiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoPratique::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
