<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class DealStatus
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static OPEN(string $description = null)
 * @method static static CLOSE(string $description = null)
 * @method static static SOLD(string $description = null)
 * @method static static RESTRUCTURED(string $description = null)
 * @method static static PROLONGED(string $description = null)
 * @method static static ANNULLED(string $description = null)
 * @method static static WRITE_OFF(string $description = null)
 * @method static static LIQUIDATION(string $description = null)
 * @method static static TERMINATION(string $description = null)
 * @method static static REPLACEMENT(string $description = null)
 */
final class DealStatus extends Dictionary
{
    public const OPEN = 1;
    public const CLOSE = 2;
    public const SOLD = 3;
    public const RESTRUCTURED = 4;
    public const PROLONGED = 5;
    public const ANNULLED = 6;
    public const WRITE_OFF = 7;
    public const LIQUIDATION = 8;
    public const TERMINATION = 9;
    public const REPLACEMENT = 10;
}
