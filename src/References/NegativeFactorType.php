<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class NegativeFactorType
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static PERSONS_WITH_FRAUDULENT_SIGNS(string $description = null)
 * @method static static DEAD(string $description = null)
 * @method static static FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS(string $description = null)
 * @method static static LIQUIDATION_PROCEDURE(string $description = null)
 * @method static static BANKRUPTCY_PROCEDURE(string $description = null)
 * @method static static BANK_DEBTORS(string $description = null)
 */
final class NegativeFactorType extends Reference
{
    public const PERSONS_WITH_FRAUDULENT_SIGNS = 1;
    public const DEAD = 2;
    public const FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS = 3;
    public const LIQUIDATION_PROCEDURE = 4;
    public const BANKRUPTCY_PROCEDURE = 5;
    public const BANK_DEBTORS = 6;
}
