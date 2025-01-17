<?php

namespace App\Controller\Admin;

use App\Entity\Reponses;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReponsesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reponses::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('reponse')
        ];
    }
}
