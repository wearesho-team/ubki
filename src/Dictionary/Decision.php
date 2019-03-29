<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
final class Decision extends Infrastructure\Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
