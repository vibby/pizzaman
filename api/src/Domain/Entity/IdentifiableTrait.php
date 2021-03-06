<?php

namespace App\Domain\Entity;

trait IdentifiableTrait
{
    private $name;
    private $code;

    private function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
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
