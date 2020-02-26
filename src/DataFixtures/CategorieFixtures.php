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
        $clc->setNom('Créer un contexte favorable');
        $manager->persist($clc);

        $eng = new Categorie();
        $eng->setNom('Bâtir autour de l\'intention de rencontre');
        $manager->persist($eng);

        $syn = new Categorie();
        $syn->setNom('Consolider le travail');
        $manager->persist($syn);

        $anc = new Categorie();
        $anc->setNom('Atterrir / Amener la déclusion');
        $manager->persist($anc);

        $dec = new Categorie();
        $dec->setNom('Architectures transversales');
        $manager->persist($dec);

        $manager->flush();
    }
}
