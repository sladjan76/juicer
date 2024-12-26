<?php

namespace App\Classes;

use App\Base\ContainerFullException;
use App\Base\ContainerInterface;
use App\Base\Fruit;

class FruitContainer implements ContainerInterface
{
    private float $capacity;
    private array $fruits;
    private float $currentVolume;

    public function __construct(float $capacity)
    {
        $this->capacity = $capacity;
        $this->fruits = [];
        $this->currentVolume = 0;
    }

    public function addFruit(Fruit $fruit): bool
    {
        if ($this->currentVolume + $fruit->getVolume() > $this->capacity) {
            throw new ContainerFullException("Container is full! Cannot add more fruits.");
        }
        $this->fruits[] = $fruit;
        $this->currentVolume += $fruit->getVolume();
        return true;
    }

    public function getFruitCount(): int
    {
        return count($this->fruits);
    }

    public function getRemainingSpace(): float
    {
        return $this->capacity - $this->currentVolume;
    }

    public function getFruits(): array
    {
        return $this->fruits;
    }

    public function clearContainer(): void
    {
        $this->fruits = [];
        $this->currentVolume = 0;
    }
}