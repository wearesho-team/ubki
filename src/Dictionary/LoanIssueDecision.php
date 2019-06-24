<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class LoanIssueDecision
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static LoanIssueDecision POSITIVE(string $description = \null)
 * @method static LoanIssueDecision NEGATIVE(string $description = \null)
 */
final class LoanIssueDecision extends Dictionary
{
    public const POSITIVE = 1;
    public const NEGATIVE = 2;
}
