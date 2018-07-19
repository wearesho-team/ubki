<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 */
final class Contact extends Ubki\Reference
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;

    public static function HOME(string $description = null): Contact
    {
        return new Contact(static::HOME, $description);
    }

    public static function WORK(string $description = null): Contact
    {
        return new Contact(static::WORK, $description);
    }

    public static function MOBILE(string $description = null): Contact
    {
        return new Contact(static::MOBILE, $description);
    }

    public static function EMAIL(string $description = null): Contact
    {
        return new Contact(static::EMAIL, $description);
    }

    public static function FAX(string $description = null): Contact
    {
        return new Contact(static::FAX, $description);
    }
}
