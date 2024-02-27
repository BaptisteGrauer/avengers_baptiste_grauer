<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\Type\AuteurType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auteur', name: 'auteur_')]
class AuteurController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $auteurs = $entityManager->getRepository(Auteur::class)->findAll();
        return $this->render('auteur/index.html.twig', ['auteurs' => $auteurs]);
    }

    #[Route('/detail/{id}', name: 'details')]
    public function details(EntityManagerInterface $entityManager, int $id)
    {
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);
        if (!$auteur) {
            throw $this->createNotFoundException("L'auteur recherché n'existe pas");
        }
        return $this->render('auteur/detail.html.twig', ['auteur' => $auteur,]);
    }

    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager)
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_ajout_succes');
        }
        return $this->render('auteur/ajout.html.twig',
            ['formulaire_ajout_auteur' => $form->createView(),]);
    }

    #[Route('/ajout-succes', name: 'ajout_succes')]
    public function ajoutSucces()
    {

    }
}
