<?php

namespace App\DataFixtures;

use App\Entity\Duree;
use App\Entity\Groupe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class GroupeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $groupe = new Groupe();
        $groupe->setGroupe("3 à 5");
        $manager->persist($groupe);

        $groupe = new Groupe();
        $groupe->setGroupe("6 à 10");
        $manager->persist($groupe);

        $groupe = new Groupe();
        $groupe->setGroupe("11 à 30");
        $manager->persist($groupe);

        $groupe = new Groupe();
        $groupe->setGroupe("31 à 75");
        $manager->persist($groupe);

        $groupe = new Groupe();
        $groupe->setGroupe("76 et plus");
        $manager->persist($groupe);

        $manager->flush();
    }
}
