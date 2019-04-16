<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CounterpartyStatus
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CounterpartyStatus NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION(string $description = \null)
 * @method static CounterpartyStatus IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED(string $description = \null)
 * @method static CounterpartyStatus IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT(string $description = \null)
 */
final class CounterpartyStatus extends Dictionary
{
    public const NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION = 0;
    public const IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED = 1;
    public const IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT = 2;
}
