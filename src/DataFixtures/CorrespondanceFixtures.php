<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Correspondance;
use App\Repository\CategorieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CorrespondanceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $faker = Faker\Factory::create('fr_FR');
//        $catrepo = new CategorieRepository();
//        for ($i = 1; $i <= 100; $i++) {
//            $co = new Correspondance();
//            $co->setCategorie($faker->randomElement($catrepo->findAll()));
//            $co->setCarte($faker->numberBetween($min = 1, $max = 5));
//            $co->setDuree($faker->numberBetween($min = 1, $max = 5));
//            $co->setGroupe($faker->numberBetween($min = 1, $max = 5));
//            $co->setExerciceId($faker->numberBetween($min = 45, $max = 67));
//            $manager->persist($co);
//        }
//        $manager->flush();
    }
}
