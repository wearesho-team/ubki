<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces\Insurance;

use Wearesho\Bobra\Ubki\ElementInterface;

/**
 * Interface Event
 * @package Wearesho\Bobra\Ubki\Data\Interfaces\Insurance
 */
interface Event extends ElementInterface
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
