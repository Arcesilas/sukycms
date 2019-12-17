<?php

namespace App\Enum;

use ReflectionClass;

abstract class Enum
{
    protected static array $constCacheArray = [];

    public static function toArray(): array
    {
        return self::getConstants();
    }

    public static function getKeys(): array
    {
        return array_keys(static::getConstants());
    }

    public static function getValues(): array
    {
        return array_values(static::getConstants());
    }

    public static function getRandomKey(): string
    {
        $keys = static::getKeys();
        return $keys[array_rand($keys)];
    }

    public static function getRandomValue()
    {
        $values = static::getValues();
        return $values[array_rand($values)];
    }

    protected static function getConstants(): array
    {
        $calledClass = static::class;
        if (!array_key_exists($calledClass, static::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            static::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return static::$constCacheArray[$calledClass];
    }

}
