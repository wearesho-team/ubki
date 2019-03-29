<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Education
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Education SECONDARY_UNFINISHED(string $description = null)
 * @method static Education SECONDARY(string $description = null)
 * @method static Education SECONDARY_TECH(string $description = null)
 * @method static Education HIGH_UNFINISHED(string $description = null)
 * @method static Education HIGH(string $description = null)
 * @method static Education ACADEMIC(string $description = null)
 * @method static Education BY_SELF(string $description = null)
 */
final class Education extends Dictionary
{
    public const SECONDARY_UNFINISHED = 1;
    public const SECONDARY = 2;
    public const SECONDARY_TECH = 3;
    public const HIGH_UNFINISHED = 4;
    public const HIGH = 5;
    public const ACADEMIC = 6;
    public const BY_SELF = 7;
}
