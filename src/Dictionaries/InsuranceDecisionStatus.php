<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class InsuranceDecisionStatus
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static POSITIVE(string $description = null)
 * @method static static NEGATIVE(string $description = null)
 */
final class InsuranceDecisionStatus extends Infrastructure\Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
