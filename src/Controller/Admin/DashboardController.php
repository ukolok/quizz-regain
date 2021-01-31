<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Reponses;
use App\Entity\Sections;
use App\Entity\Questions;
use App\Entity\Questionnaires;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Activ\'Regains');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Questionnaires', 'fas fa-poll-h', Questionnaires::class);
        yield MenuItem::linkToCrud('Sections', 'fas fa-directions', Sections::class);
        yield MenuItem::linkToCrud('Questions', 'fas fa-question-circle', Questions::class);
        yield MenuItem::linkToCrud('Reponses', 'fas fa-reply', Reponses::class);
    }
}
