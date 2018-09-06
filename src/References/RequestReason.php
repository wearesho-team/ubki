<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RequestReason
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static EXPORT(string $description = null)
 * @method static static MONITORING(string $description = null)
 * @method static static CREDIT(string $description = null)
 * @method static static SMARTPHONE_REPORTS(string $description = null)
 * @method static static CREDIT_ONLINE(string $description = null)
 * @method static static OTHER_SERVICES(string $description = null)
 * @method static static VERIFICATION(string $description = null)
 */
final class RequestReason extends Reference
{
    public const EXPORT = 0;
    public const MONITORING = 1;
    public const CREDIT = 2;
    public const SMARTPHONE_REPORTS = 3;
    public const CREDIT_ONLINE = 4;
    public const OTHER_SERVICES = 5;
    public const VERIFICATION = 6;
}
