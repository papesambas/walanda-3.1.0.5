<?php

namespace App\Controller\Super_Admin;

use App\Entity\Etablissements;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EtablissementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etablissements::class;
    }



    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('designation');
        yield SlugField::new('slug')->setTargetFieldName('designation');
        yield TextField::new('forme');
        yield TextField::new('adresse');
        yield TextField::new('numDecisionCreation');
        yield TextField::new('numDecisionOuverture');
        yield DateField::new('dateOuverture');
        yield TextField::new('numSocial');
        yield TextField::new('numFiscal');
        yield TextField::new('cpteBancaire');
        yield TelephoneField::new('telephone');
        yield TelephoneField::new('telephoneMobile');
        yield EmailField::new('email');
        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
    }
}
