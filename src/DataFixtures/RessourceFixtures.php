<?php

namespace App\DataFixtures;

use App\Entity\Ressource;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class RessourceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $faker = Faker\Factory::create('fr_FR');
//        for ($i = 0; $i < 20; $i++) {
//            $ressource = new Ressource();
//            $ressource->setNom($faker->sentence($nbWords = 3, $variableNbWords = true));
//            $ressource->setDescription($faker->sentence($nbWords = 10, $variableNbWords = false));
//            $ressource->setImage($faker->imageUrl($width = 640, $height = 480));
//            $ressource->setLien($faker->url);
//            $ressource->setImageFilename($faker->sentence($nbWords = 3, $variableNbWords = true));
//            $manager->persist($ressource);
//        }
//        $manager->flush();
    }
}
