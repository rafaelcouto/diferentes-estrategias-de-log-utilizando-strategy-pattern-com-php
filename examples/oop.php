<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use joshtronic\LoremIpsum;
use LoggingStrategyPattern\Logger\ConsoleLogger;

$consoleLogger = new ConsoleLogger();

$lipsum = new LoremIpsum();
for ($i = 1; $i <= 5; $i++) {
    $consoleLogger->log(rand(1, 3), $lipsum->words(5));
    sleep(1);
}
