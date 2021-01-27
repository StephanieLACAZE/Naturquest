<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proposal;
use App\Entity\Question;
use App\Entity\Result;


class AdminController extends AbstractDashboardController
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
            ->setTitle('NaturQuest');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Administrateur', 'fa fa-home');
        yield MenuItem::linkToCrud('Propositions ?!?!', 'fas fa-list', Proposal::class);
        yield MenuItem::linkToCrud('Questions ?', 'fa fa-tags', Question::class);
        yield MenuItem::linkToCrud('Résultats,youpi !! ', 'fas fa-user', Result::class);
    }
}
