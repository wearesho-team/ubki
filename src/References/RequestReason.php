<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RequestReason
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static RequestReason EXPORT(string $description = null)
 * @method static RequestReason MONITORING(string $description = null)
 * @method static RequestReason REQUEST_LOAN(string $description = null)
 * @method static RequestReason REPORTS_FOR_SMARTPHONE(string $description = null)
 * @method static RequestReason REQUEST_ONLINE_CREDIT(string $description = null)
 * @method static RequestReason OTHER_SERVICES(string $description = null)
 * @method static RequestReason VERIFICATION(string $description = null)
 */
final class RequestReason extends Reference
{
    public const EXPORT = 0;
    public const MONITORING = 1;
    public const REQUEST_LOAN = 2;
    public const REPORTS_FOR_SMARTPHONE = 3;
    public const REQUEST_ONLINE_CREDIT = 4;
    public const OTHER_SERVICES = 5;
    public const VERIFICATION = 6;
}
