<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $clc = new Categorie();
        $clc->setNom('Créer le champ');
        $manager->persist($clc);

        $eng = new Categorie();
        $eng->setNom('Engagement');
        $manager->persist($eng);

        $syn = new Categorie();
        $syn->setNom('Synergie');
        $manager->persist($syn);

        $anc = new Categorie();
        $anc->setNom('Ancrage');
        $manager->persist($anc);

        $dec = new Categorie();
        $dec->setNom('Déclusion');
        $manager->persist($dec);

        $manager->flush();
    }
}
