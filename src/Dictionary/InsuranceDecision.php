<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class InsuranceDecision
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static InsuranceDecision POSITIVE(string $description = \null)
 * @method static InsuranceDecision NEGATIVE(string $description = \null)
 */
final class InsuranceDecision extends Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
