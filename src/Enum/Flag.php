<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class Flag
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static Flag NO()
 * @method static Flag YES()
 * @method static Flag CONSUMER()
 * @method static Flag GUARANTOR()
 */
final class Flag extends Enum
{
    public const NO = 0;
    public const YES = 1;
    public const CONSUMER = 2;
    public const GUARANTOR = 3;
}
