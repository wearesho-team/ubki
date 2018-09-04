<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Flag
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static NO(string $description = null)
 * @method static static YES(string $description = null)
 * @method static static CONSUMER(string $description = null)
 * @method static static GUARANTOR(string $description = null)
 */
final class Flag extends Dictionary
{
    public const NO = 0;
    public const YES = 1;
    public const CONSUMER = 2;
    public const GUARANTOR = 3;
}
