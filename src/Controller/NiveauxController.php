<?php

namespace App\Controller;

use App\Entity\Niveaux;
use App\Repository\CategoriesRepository;
use App\Repository\PublicationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NiveauxController extends AbstractController
{
    #[Route('/niveaux/{slug}', name: 'app_niveaux_show')]
    public function index(?Niveaux $niveaux, PublicationsRepository $publicationsRepos, CategoriesRepository $categoriesRepos): Response
    {
        return $this->render('niveaux/show.html.twig', [
            'niveau' => $niveaux,
            'categories' => $categoriesRepos->findAll(),
        ]);
    }
    /* #[Route('/publications/{slug}', name: 'app_publications_show')]
    public function show(?Publications $publications): Response
    {
        if (!$publications) {
            return $this->redirectToRoute('app_blog');
        }
        return $this->render('publications/show.html.twig', [
            'publication' => $publications,
        ]);
    }*/
}
