<?php

declare(strict_types=1);

namespace LoggingStrategyPattern\Logger;

use LoggingStrategyPattern\AbstractLogger;
use LoggingStrategyPattern\LoggerContract;
use PDO;

class DatabaseLogger extends AbstractLogger implements LoggerContract
{
    public function __construct(private PDO $connection)
    {
    }

    public function log(int $level, string $text): void
    {
        $stmt = $this->connection->prepare("INSERT INTO logs(datetime, level, text) VALUES(CURRENT_TIMESTAMP(), :level, :text)");
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':text', $text);
        $stmt->execute();
    }
}
