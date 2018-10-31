<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class RequestReason
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static RequestReason EXPORT()
 * @method static RequestReason MONITORING()
 * @method static RequestReason CREDIT()
 * @method static RequestReason ONLINE_CREDIT()
 * @method static RequestReason VERIFICATION()
 */
final class RequestReason extends Enum
{
    public const EXPORT = 0;
    public const MONITORING = 1;
    public const CREDIT = 2;
    public const ONLINE_CREDIT = 4;
    public const VERIFICATION = 6;
}
