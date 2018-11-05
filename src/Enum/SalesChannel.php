<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SalesChannel
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SalesChannel BANK_BRANCH()
 * @method static SalesChannel STORE()
 * @method static SalesChannel INTERNET()
 * @method static SalesChannel CREDIT_BROKER()
 * @method static SalesChannel OTHER()
 */
final class SalesChannel extends Enum
{
    public const BANK_BRANCH = 1;
    public const STORE = 2;
    public const INTERNET = 3;
    public const CREDIT_BROKER = 4;
    public const OTHER = 5;
}
