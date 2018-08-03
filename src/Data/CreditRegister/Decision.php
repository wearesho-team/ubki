<?php

namespace Wearesho\Bobra\Ubki\Data\CreditRegister;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Decision
 * @package Wearesho\Bobra\Ubki\Data\CreditRegister
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
class Decision extends Reference
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}