<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class InsuranceEvent extends Ubki\Infrastructure\Element
{
    public const TAG = 'events';
    public const REQUEST_DATE = 'evdate';
    public const DECISION = 'evstate';
    public const DECISION_REF = 'evstateref';
    public const DECISION_DATE = 'evstatedate';

    /** @var \DateTimeInterface */
    protected $requestDate;

    /** @var Ubki\Dictionary\InsuranceDecisionStatus */
    protected $decision;

    /** @var \DateTimeInterface */
    protected $decisionDate;

    public function __construct(
        \DateTimeInterface $requestDate,
        Ubki\Dictionary\InsuranceDecisionStatus $decision,
        \DateTimeInterface $decisionDate
    ) {
        $this->requestDate = $requestDate;
        $this->decision = $decision;
        $this->decisionDate = $decisionDate;
    }

    public function getRequestDate(): \DateTimeInterface
    {
        return $this->requestDate;
    }

    public function getDecision(): Ubki\Dictionary\InsuranceDecisionStatus
    {
        return $this->decision;
    }

    public function getDecisionDate(): \DateTimeInterface
    {
        return $this->decisionDate;
    }
}
