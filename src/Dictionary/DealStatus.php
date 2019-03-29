<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class DealStatus
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static DealStatus OPEN(string $description = null)
 * @method static DealStatus CLOSE(string $description = null)
 * @method static DealStatus SOLD(string $description = null)
 * @method static DealStatus RESTRUCTURED(string $description = null)
 * @method static DealStatus PROLONGED(string $description = null)
 * @method static DealStatus ANNULLED(string $description = null)
 * @method static DealStatus WRITE_OFF(string $description = null)
 * @method static DealStatus LIQUIDATION(string $description = null)
 * @method static DealStatus TERMINATION(string $description = null)
 * @method static DealStatus REPLACEMENT(string $description = null)
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
