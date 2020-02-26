<?php

namespace App\DataFixtures;

use App\Entity\Footer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FooterFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $footer = new Footer();
        $footer->setPage("accueil");
        $footer->setTitre("Anatomie");
        $footer->setSoustitre("Mais qu'est-ce que c'est ?");
        $footer->setDescription("description page accueil");
        $manager->persist($footer);
        $manager->flush();

        $footer = new Footer();
        $footer->setPage("debut_design");
        $footer->setTitre("Anatomie");
        $footer->setSoustitre("Mais qu'est-ce que c'est ?");
        $footer->setDescription("description page début du Design");
        $manager->persist($footer);
        $manager->flush();
    }
}
