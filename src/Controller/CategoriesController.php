<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\NiveauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories/{slug}', name: 'app_categories_show')]
    public function index(?Categories $categories, NiveauxRepository $niveauxRepos): Response
    {
        if (!$categories) {
            return $this->redirectToRoute('app_blog');
        }
        return $this->render('categories/show.html.twig', [
            'categorie' => $categories,
            'niveaux' => $niveauxRepos->findAll(),
        ]);
    }
}
