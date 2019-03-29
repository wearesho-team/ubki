<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Decision POSITIVE(string $description = null)
 * @method static Decision NEGATIVE(string $description = null)
 */
final class Decision extends Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
