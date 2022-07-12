<?php

namespace App\Controller\Super_Admin;

use App\Entity\Cycles;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CyclesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cycles::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('designation');
        yield AssociationField::new('enseignement');
        //TextField::new('title'),
        //TextEditorField::new('description'),
    }
}
