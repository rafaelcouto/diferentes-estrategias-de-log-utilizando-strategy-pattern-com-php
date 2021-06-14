<?php

declare(strict_types=1);

namespace LoggingStrategyPattern;

class LoggerContext implements LoggerContract
{
    /** @var LoggerContract[] */
    public $loggers = [];

    public function addLogger(LoggerContract $logger): void
    {
        $this->loggers[] = $logger;
    }

    public function log(int $level, string $text): void
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $text);
        }
    }
}
