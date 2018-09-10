<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class InsuranceEvent
{
    /** @var \DateTimeInterface */
    protected $requestDate;

    /** @var int */
    protected $decision;

    /** @var \DateTimeInterface */
    protected $decisionDate;

    public function __construct(
        \DateTimeInterface $requestDate,
        int $decision,
        \DateTimeInterface $decisionDate
    ) {
        $this->requestDate = $requestDate;
        $this->decision = $decision;
        $this->decisionDate = $decisionDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'requestDate' => Carbon::instance($this->requestDate)->toDateString(),
            'decision' => $this->decision,
            'decisionDate' => Carbon::instance($this->decisionDate)->toDateString()
        ];
    }

    public function getRequestDate(): \DateTimeInterface
    {
        return $this->requestDate;
    }

    public function getDecision(): int
    {
        return $this->decision;
    }

    public function getDecisionDate(): \DateTimeInterface
    {
        return $this->decisionDate;
    }
}
