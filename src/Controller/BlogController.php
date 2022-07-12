<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\NiveauxRepository;
use App\Repository\PublicationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(PublicationsRepository $publicationsRepos, CategoriesRepository $categoriesRepos, NiveauxRepository $niveauxRepos): Response
    {
        return $this->render('blog/index.html.twig', [
            'publications' => $publicationsRepos->findAll(),
            'categories' => $categoriesRepos->findAll(),
            'niveaux' => $niveauxRepos->findAll(),
        ]);
    }
}
