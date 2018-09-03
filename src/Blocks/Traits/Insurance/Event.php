<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits\Insurance;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Trait Event
 * @package Wearesho\Bobra\Ubki\Blocks\Traits\Insurance
 */
trait Event
{
    use ElementTrait;

    /** @var \DateTimeInterface */
    protected $requestDate;

    /** @var int */
    protected $decision;

    /** @var \DateTimeInterface */
    protected $decisionDate;

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
