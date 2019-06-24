<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static InsuranceEvent make(...$arguments)
 */
class InsuranceEvent implements Ubki\Contract\Data\InsuranceEvent, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $requestDate;

    /** @var Ubki\Dictionary\InsuranceDecision */
    protected $decision;

    /** @var \DateTimeInterface */
    protected $decisionDate;

    public function __construct(
        \DateTimeInterface $requestDate,
        Ubki\Dictionary\InsuranceDecision $decision,
        \DateTimeInterface $decisionDate
    ) {
        $this->requestDate = $requestDate;
        $this->decision = $decision;
        $this->decisionDate = $decisionDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'returnDate' => Carbon::make($this->requestDate),
            'decision' => $this->decision,
            'decisionDate' => Carbon::make($this->decisionDate),
        ];
    }

    public static function tag(): string
    {
        return 'events';
    }

    public function getRequestDate(): \DateTimeInterface
    {
        return $this->requestDate;
    }

    public function getDecision(): Ubki\Dictionary\InsuranceDecision
    {
        return $this->decision;
    }

    public function getDecisionDate(): \DateTimeInterface
    {
        return $this->decisionDate;
    }
}
