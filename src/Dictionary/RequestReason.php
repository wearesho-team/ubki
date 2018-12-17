<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class RequestReason
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static EXPORT(string $description = null)
 * @method static static MONITORING(string $description = null)
 * @method static static REQUEST_LOAN(string $description = null)
 * @method static static REPORTS_FOR_SMARTPHONE(string $description = null)
 * @method static static REQUEST_ONLINE_CREDIT(string $description = null)
 * @method static static OTHER_SERVICES(string $description = null)
 * @method static static VERIFICATION(string $description = null)
 */
final class RequestReason extends Infrastructure\Dictionary
{
    public const EXPORT = 0;
    public const MONITORING = 1;
    public const REQUEST_LOAN = 2;
    public const REPORTS_FOR_SMARTPHONE = 3;
    public const REQUEST_ONLINE_CREDIT = 4;
    public const OTHER_SERVICES = 5;
    public const VERIFICATION = 6;
}
