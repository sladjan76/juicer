<?php

namespace App\Classes;

use App\Base\ContainerFullException;

class Juicer
{
    private FruitContainer $container;
    private Strainer $strainer;
    private float $totalJuiceProduced;

    public function __construct(float $capacity)
    {
        $this->container = new FruitContainer($capacity);
        $this->strainer = new Strainer($this->container->getFruits());
        $this->totalJuiceProduced = 0;
    }

    public function addApple(Apple $apple): void
    {
        echo "Adding apple with volume " . $apple->getVolume() .
            ($apple->isRotten() ? " (Rotten)" : "") . PHP_EOL;
        try {
            $this->container->addFruit($apple);
        } catch (ContainerFullException $e) {
            echo "Warning: " . $e->getMessage() . PHP_EOL;
            $this->squeezeJuice();
            $this->container->addFruit($apple);
        }
    }

    public function squeezeJuice(): float
    {
        $this->strainer = new Strainer($this->container->getFruits());
        $juiceProduced = $this->strainer->squeeze();
        $this->totalJuiceProduced += $juiceProduced;
        $this->container->clearContainer();
        echo "Squeezed juice: " . $juiceProduced . " liters" . PHP_EOL;
        return $juiceProduced;
    }

    public function getTotalJuiceProduced(): float
    {
        return $this->totalJuiceProduced;
    }

    public function getRemainingContainerSpace(): float
    {
        return $this->container->getRemainingSpace();
    }
}