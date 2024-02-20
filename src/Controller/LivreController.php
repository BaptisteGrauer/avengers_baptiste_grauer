<?php

namespace App\Controller;

use App\Entity\Livre;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/livre',name:'livre_')]
class LivreController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $livres =  $entityManager->getRepository(Livre::class)->findAll();
        return $this->render('livre/index.html.twig', [
            'livres' => $livres
        ]);
    }
    #[Route('/details/{id}', name:'details')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        if (!$livre) {
            throw $this->createNotFoundException("Le livre demandé n'existe pas");
        }
        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }
}
