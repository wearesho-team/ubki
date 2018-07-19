<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Type
 */
final class Document extends Ubki\Reference
{
    public const PASSPORT = 1;
    public const DRIVER = 2;
    public const INTERNATIONAL = 3;
    public const BIRTH = 4;
    public const SEAMAN = 5;
    public const MILITARY = 6;
    public const TEMP_CARD = 7;
    public const DIPLOMA = 8;
    public const ATTESTAT = 9;
    public const CITIZEN = 10;
    public const STATE_REGISTRATION = 11;
    public const EXTRACT_FROM_EGR = 12;
    public const ORDERING_FROM_EGR = 13;
    public const CERTIFICATE_TAXPAYERS = 14;
    public const INFORMATION_TAXPAYER = 15;
    public const RESIDENCE = 16;
    public const UKRAINE_CARD = 17;

    public static function PASSPORT(string $description = null): Document
    {
        return new Document(static::PASSPORT, $description);
    }

    public static function DRIVER(string $description = null): Document
    {
        return new Document(static::DRIVER, $description);
    }

    public static function INTERNATIONAL(string $description = null): Document
    {
        return new Document(static::INTERNATIONAL, $description);
    }

    public static function BIRTH(string $description = null): Document
    {
        return new Document(static::BIRTH, $description);
    }

    public static function SEAMAN(string $description = null): Document
    {
        return new Document(static::SEAMAN, $description);
    }

    public static function MILITARY(string $description = null): Document
    {
        return new Document(static::MILITARY, $description);
    }

    public static function TEMP_CARD(string $description = null): Document
    {
        return new Document(static::TEMP_CARD, $description);
    }

    public static function DIPLOMA(string $description = null): Document
    {
        return new Document(static::DIPLOMA, $description);
    }

    public static function ATTESTAT(string $description = null): Document
    {
        return new Document(static::ATTESTAT, $description);
    }

    public static function CITIZEN(string $description = null): Document
    {
        return new Document(static::CITIZEN, $description);
    }

    public static function STATE_REGISTRATION(string $description = null): Document
    {
        return new Document(static::STATE_REGISTRATION, $description);
    }

    public static function EXTRACT_FROM_EGR(string $description = null): Document
    {
        return new Document(static::EXTRACT_FROM_EGR, $description);
    }

    public static function ORDERING_FROM_EGR(string $description = null): Document
    {
        return new Document(static::ORDERING_FROM_EGR, $description);
    }

    public static function CERTIFICATE_TAXPAYERS(string $description = null): Document
    {
        return new Document(static::CERTIFICATE_TAXPAYERS, $description);
    }

    public static function INFORMATION_TAXPAYER(string $description = null): Document
    {
        return new Document(static::INFORMATION_TAXPAYER, $description);
    }

    public static function RESIDENCE(string $description = null): Document
    {
        return new Document(static::RESIDENCE, $description);
    }

    public static function UKRAINE_CARD(string $description = null): Document
    {
        return new Document(static::UKRAINE_CARD, $description);
    }
}
