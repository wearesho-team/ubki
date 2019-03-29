<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Education
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static SECONDARY_UNFINISHED(string $description = null)
 * @method static static SECONDARY(string $description = null)
 * @method static static SECONDARY_TECH(string $description = null)
 * @method static static HIGH_UNFINISHED(string $description = null)
 * @method static static HIGH(string $description = null)
 * @method static static ACADEMIC(string $description = null)
 * @method static static BY_SELF(string $description = null)
 */
final class Education extends Infrastructure\Dictionary
{
    public const SECONDARY_UNFINISHED = 1;
    public const SECONDARY = 2;
    public const SECONDARY_TECH = 3;
    public const HIGH_UNFINISHED = 4;
    public const HIGH = 5;
    public const ACADEMIC = 6;
    public const BY_SELF = 7;
}
