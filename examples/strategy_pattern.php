<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use joshtronic\LoremIpsum;
use LoggingStrategyPattern\LoggerContext;
use LoggingStrategyPattern\Logger\ConsoleLogger;
use LoggingStrategyPattern\Logger\FileLogger;
use LoggingStrategyPattern\Logger\DatabaseLogger;

$loggerContext = new LoggerContext();
$loggerContext->addLogger(new ConsoleLogger());
$loggerContext->addLogger(new FileLogger(__DIR__ . '/logs/log.txt'));
$loggerContext->addLogger(new DatabaseLogger(new PDO(sprintf('mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASSWORD)));

$lipsum = new LoremIpsum();
for ($i = 1; $i <= 5; $i++) {
    $loggerContext->log(rand(1, 3), $lipsum->words(5));
    sleep(1);
}
