<?php

namespace App\Domain\Entity;

class Ingredient
{
    private int $cost = 10;
    private string $code;
    private string $name;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCost(int $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
