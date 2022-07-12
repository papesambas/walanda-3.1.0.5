<?php

namespace App\Controller\Super_Admin;

use App\Entity\Niveaux;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NiveauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Niveaux::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('designation');
        yield SlugField::new('slug')->setTargetFieldName('designation')->hideOnIndex();
        yield AssociationField::new('cycle');
        //TextEditorField::new('description'),
    }
}
