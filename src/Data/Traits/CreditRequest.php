<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditRequest
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

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\CreditRequest::DATE => $this->getDate(),
            Ubki\Data\Interfaces\CreditRequest::ID => $this->getId(),
            Ubki\Data\Interfaces\CreditRequest::INN => $this->getInn(),
            Ubki\Data\Interfaces\CreditRequest::REASON => $this->getReason(),
            Ubki\Data\Interfaces\CreditRequest::DECISION => $this->getDecision(),
            Ubki\Data\Interfaces\CreditRequest::ORGANIZATION => $this->getOrganization(),

        ];
    }
}
