<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\Type\AdresseType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adresse', name: 'adresse_')]
class AdresseController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $adresses = $entityManager->getRepository(Adresse::class)->findAll();
        return $this->render('adresse/index.html.twig', ['adresses' => $adresses]);
    }

    #[Route('/detail/{id}', name: 'details')]
    public function details(EntityManagerInterface $entityManager, int $id)
    {
        $adresse = $entityManager->getRepository(Adresse::class)->find($id);
        if (!$adresse) {
            throw $this->createNotFoundException("L'adresse recherché n'existe pas");
        }
        return $this->render('adresse/detail.html.twig', ['adresse' => $adresse,]);
    }

    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager)
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adresse);
            $entityManager->flush();
            return $this->redirectToRoute('adresse_ajout_succes');
        }
        return $this->render('adresse/ajout.html.twig',['formulaire_ajout_adresse' => $form->createView(),]);
    }

    #[Route('/ajout/{id}', name:'modifier')]
    public function modifAdresse(int $id, EntityManagerInterface $entityManager, Request $request)
    {
        $adresse = $entityManager->getRepository(Adresse::class)->find($id);
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adresse);
            $entityManager->flush();
            return $this->redirectToRoute('adresse_ajout_succes');
        }
        return $this->render('adresse/ajout.html.twig',['formulaire_ajout_adresse' => $form->createView(),]);
    }
    #[Route('/ajout-succes', name: 'ajout_succes')]
    public function ajoutSucces()
    {
        return $this->render('adresse/ajout_succes.html.twig');
    }
}
