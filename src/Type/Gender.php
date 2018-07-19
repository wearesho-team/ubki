<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Data
 */
final class Gender extends Ubki\Reference
{
    public const MAN = 1;
    public const WOMAN = 2;

    public static function MAN(string $description = null): Gender
    {
        return new Gender(static::MAN, $description);
    }

    public static function WOMAN(string $description = null): Gender
    {
        return new Gender(static::WOMAN, $description);
    }
}
