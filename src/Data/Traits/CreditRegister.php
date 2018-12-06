<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

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

    /** @var Ubki\Dictionaries\Decision */
    protected $decision;

    /** @var Ubki\Dictionaries\RequestReason */
    protected $reason;

    /** @var string|null */
    protected $organization;

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\CreditRegister::DATE => $this->getDate(),
            Ubki\Data\Interfaces\CreditRegister::INN => $this->getInn(),
            Ubki\Data\Interfaces\CreditRegister::ID => $this->getId(),
            Ubki\Data\Interfaces\CreditRegister::DECISION => $this->getDecision(),
            Ubki\Data\Interfaces\CreditRegister::REASON => $this->getReason(),
            Ubki\Data\Interfaces\CreditRegister::ORGANIZATION => $this->getOrganization(),
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\CreditRegister::TAG;
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

    public function getDecision(): Ubki\Dictionaries\Decision
    {
        return $this->decision;
    }

    public function getReason(): Ubki\Dictionaries\RequestReason
    {
        return $this->reason;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
