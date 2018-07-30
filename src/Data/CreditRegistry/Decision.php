<?php

namespace Wearesho\Bobra\Ubki\CreditRegistry;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\CreditRegistry
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
class Decision extends Reference
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
