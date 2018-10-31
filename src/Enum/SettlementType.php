<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SettlementType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SettlementType HAMLET()
 * @method static SettlementType VILLAGE()
 * @method static SettlementType TOWNSHIP()
 * @method static SettlementType CITY()
 */
final class SettlementType extends Enum
{
    public const HAMLET = 1;
    public const VILLAGE = 2;
    public const TOWNSHIP = 3;
    public const CITY = 4;
}
