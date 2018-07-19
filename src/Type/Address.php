<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Type
 */
class Address extends Reference
{
    public const HOME = 1;
    public const REGISTRATION = 2;
    public const ACTUAL = 3;
    public const LEGAL = 4;
    public const MAILING = 5;
    public const WORK = 6;

    public static function HOME(string $description = null): Address
    {
        return new Address(static::HOME, $description);
    }

    public static function REGISTRATION(string $description = null): Address
    {
        return new Address(static::REGISTRATION, $description);
    }

    public static function ACTUAL(string $description = null): Address
    {
        return new Address(static::ACTUAL, $description);
    }

    public static function LEGAL(string $description = null): Address
    {
        return new Address(static::LEGAL, $description);
    }

    public static function MAILING(string $description = null): Address
    {
        return new Address(static::MAILING, $description);
    }

    public static function WORK(string $description = null): Address
    {
        return new Address(static::WORK, $description);
    }
}
