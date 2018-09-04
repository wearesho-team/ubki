<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Trait CreditRegister
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditRegister
{
    use ElementTrait;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $id;

    /** @var Decision */
    protected $decision;

    /** @var int */
    protected $reason;

    /** @var string|null */
    protected $organization;

    public function jsonSerialize(): array
    {
        return [
            'date' => Carbon::instance($this->date)->toDateString(),
            'inn' => $this->inn,
            'id' => $this->id,
            'decision' => (string)$this->decision,
            'reason' => $this->reason,
            'organization' => $this->organization
        ];
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDecision(): Decision
    {
        return $this->decision;
    }

    public function getReason(): int
    {
        return $this->reason;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
