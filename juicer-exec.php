<?php

require_once "./vendor/autoload.php";

$juicer = new \App\Classes\Juicer(20.0);
// var_dump($juicer);

$squeezeCount = 0;

for ($i = 1; $i <= 100; $i++) {
    echo "\nAction " . $i . ":" . PHP_EOL;

    if ($squeezeCount == 9) {
        $volume = 1 + (mt_rand() / mt_getrandmax()) * 4;
        $isRotten = (mt_rand() / mt_getrandmax()) < 0.2;

        $juicer->addApple(new \App\Classes\Apple("Red", $volume, $isRotten));
        $squeezeCount = 0;
        continue;
    }

    if ($juicer->getRemainingContainerSpace() < 5) {
        $juice = $juicer->squeezeJuice();
        $squeezeCount++;
    } else {
        $volume = 1 + (mt_rand() / mt_getrandmax()) * 4;
        $isRotten = (mt_rand() / mt_getrandmax()) < 0.2;
        $juicer->addApple(new \App\Classes\Apple("Red", $volume, $isRotten));
    }
}

echo "\nExecution complete!" . PHP_EOL;
echo "Total juice produced: " . $juicer->getTotalJuiceProduced() . " liters" . PHP_EOL;