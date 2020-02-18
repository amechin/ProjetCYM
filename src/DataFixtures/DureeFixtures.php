<?php

namespace App\DataFixtures;

use App\Entity\Duree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DureeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $d1 = new Duree;
        $d1->setDuree("moins de 10'");
        $manager->persist($d1);

        $d2 = new Duree;
        $d2->setDuree("10' à 30'");
        $manager->persist($d2);

        $d3 = new Duree;
        $d3->setDuree("30' à 60'");
        $manager->persist($d3);

        $d4 = new Duree;
        $d4->setDuree("60' à 120'");
        $manager->persist($d4);

        $d5 = new Duree;
        $d5->setDuree("plus de 120'");
        $manager->persist($d5);

        $manager->flush();

    }
}
