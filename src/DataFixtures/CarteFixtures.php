<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $carte = new Carte;
        $carte->setNom("Emergence / Synergie");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Rouages / Méthodes");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Décider / Collaborer");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Converger");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Inclusion");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Déclusion");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Réactivation");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Créativité");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Energizer");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Centrage");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Ancrage");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Brainstorming");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Prise de décision");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Emergence");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Connivence");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Médiation");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Jeux Coopératifs");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Autre Rouage");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Autre étape");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Autre objectif");
        $manager->persist($carte);
        $manager->flush();

        $carte = new Carte;
        $carte->setNom("Engagement");
        $manager->persist($carte);
        $manager->flush();
    }
}
