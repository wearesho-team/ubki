<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class RequestReason
 * @package Wearesho\Bobra\Ubki\Dictionaries
 */
final class RequestReason extends Dictionary
{
    public const EXPORT = 0;
    public const MONITORING = 1;
    public const REQUEST_LOAN = 2;
    public const REPORTS_FOR_SMARTPHONE = 3;
    public const REQUEST_ONLINE_CREDIT = 4;
    public const OTHER_SERVICES = 5;
    public const VERIFICATION = 6;
}
