<?php

declare(strict_types=1);

namespace LoggingStrategyPattern;

abstract class AbstractLogger
{
    protected function buildMessage(int $level, string $text): string
    {
        $dateTime = date('Y-m-d H:i:s');
        $levelName = LogLevelEnum::getName($level);

        return "[{$dateTime}] {$levelName}: {$text}" . PHP_EOL;
    }
}
