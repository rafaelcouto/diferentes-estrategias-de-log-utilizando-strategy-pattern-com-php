<?php

declare(strict_types=1);

namespace LoggingStrategyPattern\Logger;

use LoggingStrategyPattern\AbstractLogger;
use LoggingStrategyPattern\LoggerContract;
use LoggingStrategyPattern\LogLevelEnum;

class ConsoleLogger extends AbstractLogger implements LoggerContract
{
    public function log(int $level, string $text): void
    {
        $message = $this->buildMessage($level, $text);
        echo $this->getColoredMessage($level, $message);
    }

    private function getColoredMessage(int $level, string $message): string
    {
        switch ($level) {
            case LogLevelEnum::INFO:
                return "\033[36m{$message}\033[0m";
            case LogLevelEnum::WARNING:
                return "\033[33m{$message}\033[0m";
            case LogLevelEnum::ERROR:
                return "\033[31m{$message}\033[0m";
        }

        return $message;
    }
}
