<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $contact = new Contact();
            $contact->setName($faker->name($gender = null));
            $contact->setEmail($faker->freeEmail);
            $contact->setSubject($faker->text($maxNbChars = 50));
            $contact->setText($faker->text($maxNbChars = 255));
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
