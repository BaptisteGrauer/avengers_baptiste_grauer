<?php

namespace App\Controller;

use App\Entity\Faune;
use App\Entity\Flore;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/le-caillou', name: 'lecaillou_')]
class LeCaillouController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('le_caillou/index.html.twig');
    }

    #[Route('/faune', name: 'faune')]
    public function faune(EntityManagerInterface $entityManager): Response
    {
        $faune = $entityManager->getRepository(Faune::class)->findAll();
        return $this->render('le_caillou/faune.html.twig',['faune' => $faune]);
    }
    #[Route('/flore', name: 'flore')]
    public function flore(EntityManagerInterface $entityManager): Response
    {
        $flore = $entityManager->getRepository(Flore::class)->findAll();
        return $this->render('le_caillou/flore.html.twig',['flore' => $flore]);
    }
}
