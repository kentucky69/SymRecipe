<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    // /**
    //  * @var Genarator
    //  */
    // private Generator $faker;

    // public function __construct()
    // {
    //     $this->faker = Factory::create('fr_FR');
    // }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $name = array();

        for ($i = 0; $i < 50; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($faker->lastName())
                ->setPrice(mt_rand(0, 100));

            $manager->persist($ingredient);
        }


        $manager->flush();
    }
}
