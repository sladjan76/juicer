<?php

namespace App\Classes;

use App\Base\SqueezableInterface;

class Strainer implements SqueezableInterface
{
    private const JUICE_RATIO = 0.5;
    private array $fruits;

    public function __construct(array $fruits)
    {
        $this->fruits = $fruits;
    }

    public function squeeze(): float
    {
        $totalJuice = 0;
        foreach ($this->fruits as $fruit) {
            if ($fruit instanceof Apple) {
                if (!$fruit->isRotten()) {
                    $totalJuice += $fruit->getVolume() * self::JUICE_RATIO;
                }
            }
        }
        return $totalJuice;
    }
}