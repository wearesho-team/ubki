<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class NegativeFactorType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static NegativeFactorType PERSONS_WITH_FRAUDULENT_SIGNS()
 * @method static NegativeFactorType DEAD()
 * @method static NegativeFactorType FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS()
 * @method static NegativeFactorType LIQUIDATION_PROCEDURE()
 * @method static NegativeFactorType BANKRUPTCY_PROCEDURE()
 * @method static NegativeFactorType BANK_DEBTORS()
 */
class NegativeFactorType extends Enum
{
    public const PERSONS_WITH_FRAUDULENT_SIGNS = 1;
    public const DEAD = 2;
    public const FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS = 3;
    public const LIQUIDATION_PROCEDURE = 4;
    public const BANKRUPTCY_PROCEDURE = 5;
    public const BANK_DEBTORS = 6;
}
