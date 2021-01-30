<?php

namespace App\Controller\Admin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',[ 'Question'=>[]]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('NaturQuest');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Propositions', 'fas fa-list', Proposal::class);
        yield MenuItem::linkToCrud('Parcours de questions', 'fa fa-tags', Question::class);
        yield MenuItem::linkToCrud('Résultats', 'fas fa-bullhorn', Result::class);
        
    }
    public function adminDashboard()
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');

}

}
