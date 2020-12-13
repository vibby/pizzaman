<?php

namespace App\Domain\Entity;

use App\Domain\IngredientException;

class Pizza
{
    /** @var Ingredient[] */
    private $ingredients = [];

    public function addIngredient(Ingredient $ingredient)
    {
        // Check if ingredient is already inside
        $ingredients = array_filter(
            $this->ingredients,
            function ($item) use ($ingredient) {
                return $item->getCode() === $ingredient->getCode();
            }
        );
        if (count($ingredients)) {
            throw new IngredientException('Ingredient is already included in Pizza');
        }

        $this->ingredients[] = $ingredient;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function removeIngredient(Ingredient $ingredient)
    {
        $ingredients = array_filter(
            $this->ingredients,
            function ($item) use ($ingredient) {
                return $item->getCode() !== $ingredient->getCode();
            }
        );

        if ($ingredients === $this->ingredients) {
            throw new IngredientException('Ingredient is not included in Pizza');
        }

        $this->ingredients = $ingredients;
    }

    public function calculatePrice()
    {
        return $this->calculateCost() * 1.5;
    }

    public function calculateCost()
    {
        return array_reduce(
            $this->ingredients,
            function ($sum, $ingredient) {
                return $sum + (int) $ingredient->getCost();
            }
        );
    }
}
