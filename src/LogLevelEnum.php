<?php

declare(strict_types=1);

namespace LoggingStrategyPattern;

final class LogLevelEnum
{
    use EnumHelper;

    public const INFO = 1;
    public const WARNING = 2;
    public const ERROR = 3;
}
