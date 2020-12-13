<?php

namespace spec\App\Domain\Entity;

use App\Domain\Entity\Ingredient;
use PhpSpec\ObjectBehavior;

class IngredientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Ingredient::class);
    }

    function let()
    {
        $this->beConstructedWith('code');
    }

    public function it_has_a_code()
    {
        $this->getCode()->shouldReturn('code');
    }

    public function it_has_a_cost()
    {
        $this->getCost()->shouldReturn(10);
    }
}
