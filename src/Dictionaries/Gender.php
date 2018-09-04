<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static MAN(string $description = null)
 * @method static static WOMAN(string $description = null)
 */
final class Gender extends Dictionary
{
    public const MAN = 1;
    public const WOMAN = 2;
}
