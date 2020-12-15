<?php

namespace App\Domain\Entity;

use App\Domain\IngredientException;
use Doctrine\Common\Collections\ArrayCollection;

class Pizza
{
    use IdentifiableTrait;

    /** @var ArrayCollection */
    private $ingredients = [];

    public function __construct(string $code)
    {
        $this->ingredients = new ArrayCollection();
        $this->setCode($code);
    }

    public function addIngredient(Ingredient $ingredient)
    {
        if (in_array($ingredient, $this->getIngredients())) {
            throw new IngredientException('Ingredient is already included in Pizza');
        }

        $this->ingredients->add($ingredient);
    }

    public function getIngredients(): array
    {
        return $this->ingredients->getValues();
    }

    public function removeIngredient(Ingredient $ingredient)
    {
        if (!in_array($ingredient, $this->getIngredients())) {
            throw new IngredientException('Ingredient is not included in Pizza');
        }

        $this->ingredients->removeElement($ingredient);
    }

    public function getPrice()
    {
        return $this->getCost() * 1.5;
    }

    public function getCost()
    {
        return array_reduce(
            $this->getIngredients(),
            function ($sum, $ingredient) {
                return $sum + (int) $ingredient->getCost();
            }
        );
    }
}
