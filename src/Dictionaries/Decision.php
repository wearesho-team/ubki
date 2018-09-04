<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
final class Decision extends Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
