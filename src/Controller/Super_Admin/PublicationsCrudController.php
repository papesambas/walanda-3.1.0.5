<?php

namespace App\Controller\Super_Admin;

use App\Entity\Publications;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PublicationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publications::class;
    }



    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');
        yield SlugField::new('slug')->setTargetFieldName('titre')->hideOnIndex();
        yield TextEditorField::new('contenu');
        yield TextField::new('featuredText');
        yield AssociationField::new('categorie');
        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
        yield BooleanField::new('isActive')->hideOnForm();
        yield BooleanField::new('isPublished')->hideOnForm();
        yield BooleanField::new('isFavoris')->hideOnForm();
    }
}
