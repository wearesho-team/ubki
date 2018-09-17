<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries\InsuranceDecisionStatus;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class InsuranceEvent extends Infrastructure\Element
{
    public const TAG = 'events';
    public const REQUEST_DATE = 'evdate';
    public const DECISION = 'evstate';
    public const DECISION_REF = 'evstateref';
    public const DECISION_DATE = 'evstatedate';

    /** @var \DateTimeInterface */
    protected $requestDate;

    /** @var InsuranceDecisionStatus */
    protected $decision;

    /** @var \DateTimeInterface */
    protected $decisionDate;

    public function __construct(
        \DateTimeInterface $requestDate,
        InsuranceDecisionStatus $decision,
        \DateTimeInterface $decisionDate
    ) {
        $this->requestDate = $requestDate;
        $this->decision = $decision;
        $this->decisionDate = $decisionDate;

        parent::__construct();
    }

    public function jsonSerialize(): array
    {
        return [
            static::REQUEST_DATE => $this->requestDate,
            static::DECISION => $this->decision,
            static::DECISION_DATE => $this->decisionDate
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getRequestDate(): \DateTimeInterface
    {
        return $this->requestDate;
    }

    public function getDecision(): InsuranceDecisionStatus
    {
        return $this->decision;
    }

    public function getDecisionDate(): \DateTimeInterface
    {
        return $this->decisionDate;
    }
}
