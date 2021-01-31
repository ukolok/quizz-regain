<?php

namespace App\Controller\Admin;

use App\Entity\Questions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Questions::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            NumberField::new('orderid'),
            AssociationField::new('listeAffichage'),
            BooleanField::new('requis'),
            AssociationField::new('listeValeur'),
            AssociationField::new('section')
        ];
    }
}
