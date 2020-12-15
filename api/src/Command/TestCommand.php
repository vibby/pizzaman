<?php

namespace App\Command;

use App\Domain\Entity\Ingredient;
use App\Domain\Entity\Pizza;
use \Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\SerializerInterface;

class TestCommand extends Command
{
    private $serializer;

    public function __construct(string $name = null, SerializerInterface $serializer)
    {
        parent::__construct($name);
        $this->serializer = $serializer;
    }

    protected static $defaultName = 'app:test';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ingredient1 = new Ingredient('i1', 100);
        $ingredient2 = new Ingredient('i2', 240);
        $ingredient3 = new Ingredient('i3', 200);
        $pizza = new Pizza('p1');
        $pizza->addIngredient($ingredient1);
        $pizza->addIngredient($ingredient2);
        $pizza->addIngredient($ingredient3);

        dump($pizza);
        dump($this->serializer->serialize($pizza, 'json', ['groups' => 'pizza']));

        return Command::SUCCESS;
    }
}
