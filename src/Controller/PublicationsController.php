<?php

namespace App\Controller;

use DateTime;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Entity\Publications;
use App\Repository\NiveauxRepository;
use App\Repository\CategoriesRepository;
use App\Repository\PublicationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PublicationsController extends AbstractController
{
    #[Route('/publications/{slug}', name: 'app_publications_show')]
    public function show($slug,Request $request,
        PublicationsRepository $publicationsRepos,
        CategoriesRepository $categoriesRepos,
        NiveauxRepository $niveauxRepos,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine
    ): Response {
        $publication = $publicationsRepos->findOneBy(['slug' => $slug ]);

        if (!$publication) {
            return $this->redirectToRoute('app_blog');
        }
        //Partie commentaires
        //On crée le commentaire "vierge"
        $comment = new Comments;

        //on génère le formulaire
        $commentForm = $this->createForm(CommentsType::class, $comment);

        $commentForm->handleRequest($request);

        //Traitement du Formulaire
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setPublication($publication);
            $comment->setUsers($this->getUser());
            $em = $doctrine->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('message','Votre Commentaire a bein été envoyé');
            return $this->redirectToRoute('app_publications_show',['slug' => $publication->getSlug()]);

        }

        return $this->render('publications/show.html.twig', [
            'publication' => $publication,
            'categories' => $categoriesRepos->findAll(),
            'niveaux' => $niveauxRepos->findAll(),
            'commentForm'=> $commentForm->createView()
        ]);
    }
}