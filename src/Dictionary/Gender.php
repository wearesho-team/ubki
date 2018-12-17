<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static MAN(string $description = null)
 * @method static static WOMAN(string $description = null)
 */
final class Gender extends Infrastructure\Dictionary
{
    public const MAN = 1;
    public const WOMAN = 2;
}
