<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Flag
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static NO(string $description = null)
 * @method static static YES(string $description = null)
 * @method static static CONSUMER(string $description = null)
 * @method static static GUARANTOR(string $description = null)
 */
class Flag extends Reference
{
    public const NO = 0;
    public const YES = 1;
    public const CONSUMER = 2;
    public const GUARANTOR = 3;
}
