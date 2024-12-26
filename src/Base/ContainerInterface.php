<?php

namespace App\Base;

interface ContainerInterface
{
    public function addFruit(Fruit $fruit): bool;
    public function getFruitCount(): int;
    public function getRemainingSpace(): float;
}
