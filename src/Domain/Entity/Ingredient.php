<?php

namespace App\Domain\Entity;

class Ingredient
{
    use IdentifiableTrait;

    private int $cost = 10;
    private $pizzas;

    public function setCost(int $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}
