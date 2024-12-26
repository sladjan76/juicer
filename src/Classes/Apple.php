<?php

namespace App\Classes;

use App\Base\Fruit;

class Apple extends Fruit
{
    private bool $isRotten;

    public function __construct(string $color, float $volume, bool $isRotten)
    {
        parent::__construct($color, $volume);
        $this->isRotten = $isRotten;
    }

    public function isRotten(): bool
    {
        return $this->isRotten;
    }
}