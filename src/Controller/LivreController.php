<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\Type\LivreType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/livre', name: 'livre_')]
class LivreController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $livres = $entityManager->getRepository(Livre::class)->findAll();
        return $this->render('livre/index.html.twig', [
            'livres' => $livres
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response
    {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        if (!$livre) {
            throw $this->createNotFoundException("Le livre demandé n'existe pas");
        }
        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }

    // Formulaire d'ajout
    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager)
    {
        $livre = new Livre();
        $livre->setTitre("Titre"); // Pour pré-renseigner des valeurs
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_ajout_succes');
        }
        return $this->render('livre/ajout.html.twig',
            ['formulaire_ajout_livre' => $form->createView(),]);
    }


    #[Route('/ajout/{id}', name:'modifier')]
    public function modifAuteur(int $id, EntityManagerInterface $entityManager, Request $request)
    {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_ajout_succes');
        }
        return $this->render('auteur/ajout.html.twig',['formulaire_ajout_auteur' => $form->createView(),]);
    }
    // Confirmation d'envoi du formulaire
    #[Route('/ajout-succes', name: 'ajout_succes')]
    public function ajoutSucces()
    {
        return $this->render('livre/ajout_succes.html.twig');
    }
}
