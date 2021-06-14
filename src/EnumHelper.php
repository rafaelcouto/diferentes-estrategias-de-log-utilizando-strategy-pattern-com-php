<?php

declare(strict_types=1);

namespace LoggingStrategyPattern;

use InvalidArgumentException;
use ReflectionClass;

trait EnumHelper
{
    public static function getName(int $value): string
    {
        $class = new ReflectionClass(static::class);
        $name = array_search($value, $class->getConstants());

        if (!$name) {
            throw new InvalidArgumentException();
        }

        return $name;
    }
}
