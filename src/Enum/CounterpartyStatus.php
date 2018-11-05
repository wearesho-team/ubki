<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CounterpartyStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CounterpartyStatus NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION()
 * @method static CounterpartyStatus IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED()
 * @method static CounterpartyStatus IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT()
 */
final class CounterpartyStatus extends Enum
{
    public const NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION = 0;
    public const IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED = 1;
    public const IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT = 2;
}
