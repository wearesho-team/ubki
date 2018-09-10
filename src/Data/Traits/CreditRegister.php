<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditRegister
{
    /** @var \DateTimeInterface */
    protected $date;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $id;

    /** @var Dictionaries\Decision */
    protected $decision;

    /** @var Dictionaries\RequestReason */
    protected $reason;

    /** @var string|null */
    protected $organization;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\CreditRegister::DATE => $this->date,
            Interfaces\CreditRegister::INN => $this->inn,
            Interfaces\CreditRegister::ID => $this->id,
            Interfaces\CreditRegister::DECISION => $this->decision,
            Interfaces\CreditRegister::REASON => $this->reason,
            Interfaces\CreditRegister::ORGANIZATION => $this->organization,
        ];
    }

    public function tag(): string
    {
        return Interfaces\CreditRegister::TAG;
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

    public function getDecision(): Dictionaries\Decision
    {
        return $this->decision;
    }

    public function getReason(): Dictionaries\RequestReason
    {
        return $this->reason;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
