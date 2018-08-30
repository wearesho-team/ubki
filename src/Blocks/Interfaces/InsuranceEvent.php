<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;

/**
 * Interface InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface InsuranceEvent extends ElementInterface
{
    public const TAG = 'events';
    public const REQUEST_DATE = 'evdate';
    public const DECISION = 'evstate';
    public const DECISION_REF = 'evstateref';
    public const DECISION_DATE = 'evstatedate';

    public function getRequestDate(): \DateTimeInterface;

    public function getDecision(): int;

    public function getDecisionDate(): \DateTimeInterface;
}
