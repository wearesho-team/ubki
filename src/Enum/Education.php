<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class Education
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static Education SECONDARY_UNFINISHED()
 * @method static Education SECONDARY()
 * @method static Education SECONDARY_TECH()
 * @method static Education HIGH_UNFINISHED()
 * @method static Education HIGH()
 * @method static Education ACADEMIC()
 * @method static Education BY_SELF()
 */
final class Education extends Enum
{
    public const SECONDARY_UNFINISHED = 1;
    public const SECONDARY = 2;
    public const SECONDARY_TECH = 3;
    public const HIGH_UNFINISHED = 4;
    public const HIGH = 5;
    public const ACADEMIC = 6;
    public const BY_SELF = 7;
}
