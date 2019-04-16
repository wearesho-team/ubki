<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface InsuranceEvent
{
    public const REQUEST_DATE = 'evdate';
    public const DECISION = 'evstate';
    public const DECISION_REF = 'evstateref';
    public const DECISION_DATE = 'evstatedate';

    public function getRequestDate(): \DateTimeInterface;

    public function getDecision(): Ubki\Dictionary\InsuranceDecision;

    public function getDecisionDate(): \DateTimeInterface;
}
