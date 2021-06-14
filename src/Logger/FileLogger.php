<?php

declare(strict_types=1);

namespace LoggingStrategyPattern\Logger;

use LoggingStrategyPattern\AbstractLogger;
use LoggingStrategyPattern\LoggerContract;

class FileLogger extends AbstractLogger implements LoggerContract
{
    /** @var resource */
    private $fileResource;

    public function __construct(string $filePath)
    {
        $this->fileResource = fopen($filePath, 'a');
    }

    public function log(int $level, string $text): void
    {
        fwrite($this->fileResource, $this->buildMessage($level, $text));
    }

    public function __destruct()
    {
        if ($this->fileResource) {
            fclose($this->fileResource);
        }
    }
}
