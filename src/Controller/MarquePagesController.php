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
}
