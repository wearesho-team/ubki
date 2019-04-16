<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class SalesChannel
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static SalesChannel BANK_BRANCH(string $description = \null)
 * @method static SalesChannel STORE(string $description = \null)
 * @method static SalesChannel INTERNET(string $description = \null)
 * @method static SalesChannel CREDIT_BROKER(string $description = \null)
 * @method static SalesChannel OTHER(string $description = \null)
 */
final class SalesChannel extends Dictionary
{
    public const BANK_BRANCH = 1;
    public const STORE = 2;
    public const INTERNET = 3;
    public const CREDIT_BROKER = 4;
    public const OTHER = 5;
}
