<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Ingredient
{
    use IdentifiableTrait;

    private int $cost;
    private $pizzas;

    public function __construct(string $code, int $cost)
    {
        $this->setCode($code);
        $this->setCost($cost);
        $this->pizzas = new ArrayCollection();
    }

    public function setCost(int $cost)
    {
        $this->cost = $cost;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getPizzas(): array
    {
        return $this->pizzas->getValues();
    }
}
