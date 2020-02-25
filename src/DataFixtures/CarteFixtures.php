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

    }
}
