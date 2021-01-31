<?php

namespace App\Controller\Admin;

use App\Entity\Questionnaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionnairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Questionnaires::class;
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
