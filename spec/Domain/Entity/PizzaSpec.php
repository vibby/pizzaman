<?php

namespace spec\App\Domain\Entity;

use App\Domain\Entity\Ingredient;
use App\Domain\Entity\Pizza;
use App\Domain\IngredientException;
use PhpSpec\ObjectBehavior;

class PizzaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Pizza::class);
    }

    public function it_can_accept_another_ingredient(Ingredient $ingredient)
    {
        $this->addIngredient($ingredient);
        $this->getIngredients()->shouldReturn([$ingredient]);
    }

    public function it_cannot_accept_same_ingredient(Ingredient $ingredient)
    {
        $this->addIngredient($ingredient);
        $this->shouldThrow(IngredientException::class)->duringAddIngredient($ingredient);
    }

    public function it_can_remove_an_ingredient(Ingredient $ingredient)
    {
        $this->addIngredient($ingredient);
        $this->removeIngredient($ingredient);
        $this->getIngredients()->shouldReturn([]);
    }

    public function it_cannot_remove_an_ingredient_that_is_not_inside(Ingredient $ingredient)
    {
        $this->shouldThrow(IngredientException::class)->duringRemoveIngredient($ingredient);
    }

    public function it_sums_ingredients_cost(Ingredient $ingredient1, Ingredient $ingredient2)
    {
        $ingredient1->getCost()->willReturn(100);
        $ingredient1->getCode()->willReturn('i1');
        $this->addIngredient($ingredient1);
        $ingredient2->getCost()->willReturn(300);
        $ingredient2->getCode()->willReturn('i2');
        $this->addIngredient($ingredient2);
        $this->calculateCost()->shouldReturn((100 + 300));
    }

    public function it_add_cooking_cost(Ingredient $ingredient1, Ingredient $ingredient2)
    {
        $ingredient1->getCost()->willReturn(100);
        $ingredient1->getCode()->willReturn('i1');
        $this->addIngredient($ingredient1);
        $this->calculatePrice()->shouldReturn(100 * 1.5);
    }
}
