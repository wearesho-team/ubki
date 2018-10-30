<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class DealStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static DealStatus OPEN()
 * @method static DealStatus CLOSE()
 * @method static DealStatus SOLD()
 * @method static DealStatus RESTRUCTURED()
 * @method static DealStatus PROLONGED()
 * @method static DealStatus ANNULLED()
 * @method static DealStatus WRITE_OFF()
 * @method static DealStatus LIQUIDATION()
 * @method static DealStatus TERMINATION()
 * @method static DealStatus REPLACEMENT()
 */
final class DealStatus extends Enum
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
