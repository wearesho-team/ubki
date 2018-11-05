<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class LinkedRole
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static LinkedRole FOUNDER()
 * @method static LinkedRole DIRECTOR()
 * @method static LinkedRole MANAGER()
 */
final class LinkedRole extends Enum
{
    public const FOUNDER = 1;
    public const DIRECTOR = 2;
    public const MANAGER = 3;
}
