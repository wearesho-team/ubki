<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces\Insurance;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Interface InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Interfaces\Insurance
 */
interface Event extends Element
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
