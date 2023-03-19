<?php

namespace App\Controller\Admin;

use App\Entity\Pays;
use App\Entity\Centre;
use App\Entity\Maladie;
use App\Entity\Symptome;
use App\Entity\AdresseUtil;
use App\Entity\InfoPratique;
use App\Entity\AchatConseille;
use App\Controller\Admin\PaysCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
    ) {
    }
    
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(PaysCrudController::class)->generateUrl());

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
            ->setTitle('DiagVoyage Api');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Pays', 'fa fa-tags', Pays::class);
        yield MenuItem::linkToCrud('Adresses Utiles', 'fa fa-tags', AdresseUtil::class);
        yield MenuItem::linkToCrud('Maladie', 'fa fa-tags', Maladie::class);
        yield MenuItem::linkToCrud('Symptomes', 'fa fa-tags', Symptome::class);
        yield MenuItem::linkToCrud('Infos Pratiques', 'fa fa-tags', InfoPratique::class);
        yield MenuItem::linkToCrud('Centres Vaccination', 'fa fa-tags', Centre::class);
        yield MenuItem::linkToCrud('Achats conseillés', 'fa fa-tags', AchatConseille::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
