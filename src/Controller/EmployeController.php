<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\Type\EmployeType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/employe', name: 'employe_')]
class EmployeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $employes = $entityManager->getRepository(Employe::class)->findAll();
        return $this->render('employe/index.html.twig', ['employes' => $employes]);
    }

    #[Route('/detail/{id}', name: 'details')]
    public function details(EntityManagerInterface $entityManager, int $id)
    {
        $employe = $entityManager->getRepository(Employe::class)->find($id);
        if (!$employe) {
            throw $this->createNotFoundException("L'employe recherché n'existe pas");
        }
        return $this->render('employe/detail.html.twig', ['employe' => $employe,]);
    }

    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager)
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();
            return $this->redirectToRoute('employe_ajout_succes');
        }
        return $this->render('employe/ajout.html.twig',['formulaire_ajout_employe' => $form->createView(),]);
    }

    #[Route('/ajout/{id}', name:'modifier')]
    public function modifEmploye(int $id, EntityManagerInterface $entityManager, Request $request)
    {
        $employe = $entityManager->getRepository(Employe::class)->find($id);
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();
            return $this->redirectToRoute('employe_ajout_succes');
        }
        return $this->render('employe/ajout.html.twig',['formulaire_ajout_employe' => $form->createView(),]);
    }
    #[Route('/ajout-succes', name: 'ajout_succes')]
    public function ajoutSucces()
    {
        return $this->render('employe/ajout_succes.html.twig');
    }
}
