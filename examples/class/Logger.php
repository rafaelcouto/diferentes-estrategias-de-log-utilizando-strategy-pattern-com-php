<?php

declare(strict_types=1);

use LoggingStrategyPattern\Logger\ConsoleLogger;
use LoggingStrategyPattern\Logger\DatabaseLogger;
use LoggingStrategyPattern\Logger\FileLogger;
use LoggingStrategyPattern\LoggerContext;

final class Logger
{
    public static ?Logger $instance = null;

    private LoggerContext $loggerContext;

    public static function getInstance(): Logger
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->setUp();
    }

    private function setUp(): void
    {
        $this->loggerContext = new LoggerContext();
        $this->loggerContext->addLogger(new ConsoleLogger());
        $this->loggerContext->addLogger(new FileLogger(__DIR__ . '/../logs/log.txt'));
        $this->loggerContext->addLogger(new DatabaseLogger(new PDO(sprintf('mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASSWORD)));
    }

    public function log(int $level, string $text)
    {
        $this->loggerContext->log($level, $text);
    }
}
