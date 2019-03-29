<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Flag
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Flag NO(string $description = null)
 * @method static Flag YES(string $description = null)
 * @method static Flag CONSUMER(string $description = null)
 * @method static Flag GUARANTOR(string $description = null)
 */
final class Flag extends Dictionary
{
    public const NO = 0;
    public const YES = 1;
    public const CONSUMER = 2;
    public const GUARANTOR = 3;
}
