<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
final class Decision extends Reference
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
