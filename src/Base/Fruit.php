<?php

namespace App\Base;

abstract class Fruit
{
    protected string $color;
    protected float $volume;

    public function __construct(string $color, float $volume)
    {
        $this->color = $color;
        $this->volume = $volume;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }
}