<?php

namespace App\Fixtures;

use App\Domain\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixture extends Fixture
{
    const PEPPER = 'Ingredient_Pepper';
    const TOMATOES = 'Ingredient_Tomatoes';
    const MUSHROOMS = 'Ingredient_Mushrooms';
    const OLIVES = 'Ingredient_Olives';
    const ONIONS = 'Ingredient_Onions';

    public function load(ObjectManager $manager)
    {
        $pepper = new Ingredient('pepper', 300);
        $pepper->setName('Pepper');
        $manager->persist($pepper);

        $tomatoes = new Ingredient('tomatoes', 200);
        $tomatoes->setName('Tomatoes');
        $manager->persist($tomatoes);

        $mushrooms = new Ingredient('mushrooms', 250);
        $mushrooms->setName('Mushrooms');
        $manager->persist($mushrooms);

        $olives = new Ingredient('olives', 100);
        $olives->setName('olives');
        $manager->persist($olives);

        $onions = new Ingredient('onions', 100);
        $onions->setName('Onions');
        $manager->persist($onions);

        $manager->flush();

        $this->addReference(self::PEPPER, $pepper);
        $this->addReference(self::TOMATOES, $tomatoes);
        $this->addReference(self::MUSHROOMS, $mushrooms);
        $this->addReference(self::OLIVES, $olives);
        $this->addReference(self::ONIONS, $onions);
    }
}
