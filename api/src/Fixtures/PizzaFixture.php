<?php

namespace App\Fixtures;

use App\Domain\Entity\Pizza;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PizzaFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $pizza = new Pizza('calzone');
        $pizza->setName('Calzone');
        $pizza->addIngredient($this->getReference(IngredientFixture::TOMATOES));
        $pizza->addIngredient($this->getReference(IngredientFixture::ONIONS));
        $manager->persist($pizza);

        $pizza = new Pizza('margherita');
        $pizza->addIngredient($this->getReference(IngredientFixture::TOMATOES));
        $pizza->setName('Margherita');
        $manager->persist($pizza);

        $pizza = new Pizza('capricciosa');
        $pizza->addIngredient($this->getReference(IngredientFixture::OLIVES));
        $pizza->addIngredient($this->getReference(IngredientFixture::TOMATOES));
        $pizza->addIngredient($this->getReference(IngredientFixture::MUSHROOMS));
        $pizza->addIngredient($this->getReference(IngredientFixture::ONIONS));
        $pizza->setName('Capricciosa');
        $manager->persist($pizza);

        $pizza = new Pizza('quattro_stagioni');
        $pizza->setName('Quattro Stagioni');
        $manager->persist($pizza);

        $manager->flush();
    }
}
