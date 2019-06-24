<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class NegativeFactor
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static NegativeFactor PERSONS_WITH_FRAUDULENT_SIGNS(string $description = \null)
 * @method static NegativeFactor DEAD(string $description = \null)
 * @method static NegativeFactor FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS(string $description = \null)
 * @method static NegativeFactor LIQUIDATION_PROCEDURE(string $description = \null)
 * @method static NegativeFactor BANKRUPTCY_PROCEDURE(string $description = \null)
 * @method static NegativeFactor BANK_DEBTORS(string $description = \null)
 */
final class NegativeFactor extends Dictionary
{
    public const PERSONS_WITH_FRAUDULENT_SIGNS = 1;
    public const DEAD = 2;
    public const FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS = 3;
    public const LIQUIDATION_PROCEDURE = 4;
    public const BANKRUPTCY_PROCEDURE = 5;
    public const BANK_DEBTORS = 6;
}
