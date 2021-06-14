<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use joshtronic\LoremIpsum;

function console_log(int $level, string $text): void
{
    $dateTime = date('Y-m-d H:i:s');
    $levelNames = [1 => 'INFO', 2 => 'WARNING', 3 => 'ERROR'];

    $message = "[{$dateTime}] {$levelNames[$level]}: {$text}";

    switch ($level) {
        case 1:
            $message = "\033[36m{$message}\033[0m";
            break;
        case 2:
            $message = "\033[33m{$message}\033[0m";
            break;
        case 3:
            $message = "\033[31m{$message}\033[0m";
            break;
    }

    echo $message . PHP_EOL;
}

$lipsum = new LoremIpsum();
for ($i = 1; $i <= 5; $i++) {
    console_log(rand(1, 3), $lipsum->words(5));
    sleep(1);
}
