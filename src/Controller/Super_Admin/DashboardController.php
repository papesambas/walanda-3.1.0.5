<?php

namespace App\Controller\Super_Admin;

use App\Entity\Pages;
use App\Entity\Cycles;
use App\Entity\Medias;
use App\Entity\Classes;
use App\Entity\Niveaux;
use App\Entity\Options;
use App\Entity\Comments;
use App\Entity\Categories;
use App\Entity\Publications;
use App\Entity\Enseignements;
use App\Entity\Etablissements;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/super/admin', name: 'super_admin')]
    public function index(): Response
    {
        return $this->render('super_admin/dashboard.html.twig');
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Walanda 3 1 0');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de Bord', 'fa fa-home');
        yield MenuItem::linkToRoute('Mon Blog', 'fa fa-blog', routeName: 'app_blog');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::subMenu('Etablissements', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Tous les établissements', 'fas fa-list', Etablissements::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Etablissements::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Tous les enseignements', 'fas fa-list', Enseignements::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Enseignements::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Tous les cycles', 'fas fa-list', Cycles::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Cycles::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Tous les Niveaux', 'fas fa-list', Niveaux::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Niveaux::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Toutes les classes', 'fas fa-list', Classes::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Classes::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Publications', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Toutes les publications', 'fas fa-list', Publications::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Publications::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Toutes les catégories', 'fas fa-list', Categories::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Categories::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Tous les commentaires', 'fas fa-list', Comments::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Comments::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', Comments::class);

        yield MenuItem::subMenu('Pages', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Toutes les pages', 'fas fa-list', Pages::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Pages::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Médias', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Tous les médias', 'fas fa-list', Medias::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Medias::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Options', 'fas fa-university')->setSubItems([
            MenuItem::linkToCrud('Toutes les options', 'fas fa-list', Options::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Options::class)->setAction(Crud::PAGE_NEW),
        ]);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}