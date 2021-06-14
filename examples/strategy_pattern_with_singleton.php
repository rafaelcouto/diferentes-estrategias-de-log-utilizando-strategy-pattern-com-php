<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/class/Logger.php';

use joshtronic\LoremIpsum;

$logger = Logger::getInstance();

$lipsum = new LoremIpsum();
for ($i = 1; $i <= 5; $i++) {
    $logger->log(rand(1, 3), $lipsum->words(5));
    sleep(1);
}
