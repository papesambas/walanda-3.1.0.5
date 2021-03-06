<?php

namespace App\Controller\Super_Admin;

use App\Entity\Options;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OptionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Options::class;
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
