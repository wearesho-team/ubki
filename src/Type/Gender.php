<?php

namespace Wearesho\Bobra\Ubki\Type;

use MyCLabs\Enum\Enum;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Gender MAN()
 * @method static Gender WOMAN()
 * @method int getValue()
 */
final class Gender extends Enum
{
    public const MAN = 1;
    public const WOMAN = 2;
}
