<?php

namespace App\Controller;

use App\Entity\MarquePage;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MarquePagesController extends AbstractController
{
    #[Route('/', name: 'marque_pages')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $marque_pages = $entityManager->getRepository(MarquePage::class)->findAll();
        return $this->render('marque_pages/index.html.twig', [
            'marque_pages' => $marque_pages
        ]);
    }

    #[Route('/ajouter')]
    public function ajoutMarquePage(EntityManagerInterface $entityManager){
        $marque_page = new MarquePage();
        $marque_page->setUrl("https://site.nc/");
        $marque_page->setDateCreation(new \DateTime());
        $marque_page->setCommentaire("Pas de commentaire");
        $entityManager->persist($marque_page);
        $entityManager->flush();
        return new Response("Marque page ajouté avec succès (id :".$marque_page->getId().")");
    }
}
