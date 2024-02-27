<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Livre;
use App\Entity\MarquePage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ajout des livres

        $listeAuteurs = array();
        for ($i = 0; $i <25; $i++){
            $auteur = new Auteur();
            $auteur->setNom('Nom '.$i);
            $auteur->setPrenom('Prénom '.$i);
            //$auteur->setDateNaissance(new \DateTime());
            $manager->persist($auteur);
            $listeAuteurs[] = $auteur;
        }

        for ($i = 0; $i < 15; $i++){
            $livre = new Livre();
            $livre->setTitre('Livre '.$i);
            $livre->setAuteur('Auteur '.$i);
            //$livre->setDatePublication(new \DateTime(mt_rand(1970,2024)));
        }

        // ajout des marque-pages

        for ($i = 0; $i < 25; $i++){
            $marquepage = new MarquePage();
            $marquepage->setUrl("https://".$i);
            $marquepage->setCommentaire($i);
            $marquepage->setDateCreation(new \DateTime(mt_rand(1975,2020).'-'.mt_rand(1,31).'-'.mt_rand(1,31)));
            $nbMotCles = mt_rand(2,5);
            //for ($j = 0; $j < $nbMotCles; $j++){
            //    $motcles = new Mo
            //}
            $manager->persist($marquepage);
        }

        $manager->flush();
    }
}
