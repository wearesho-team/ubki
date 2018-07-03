<?php

namespace Wearesho\Bobra\Ubki\Pull;

use MyCLabs\Enum\Enum;

/**
 * Interface Reason
 * @package Wearesho\Bobra\Ubki\Pull
 */
final class Reason extends Enum
{
    public const MONITORING = 1;
    public const REQUEST = 2;
    public const ONLINE_CREDIT = 3;
    public const OTHER = 5;
    public const VERIFICATION = 6;
}
