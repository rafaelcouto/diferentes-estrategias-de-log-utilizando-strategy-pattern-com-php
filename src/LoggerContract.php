<?php

declare(strict_types=1);

namespace LoggingStrategyPattern;

interface LoggerContract
{
    public function log(int $level, string $text): void;
}
