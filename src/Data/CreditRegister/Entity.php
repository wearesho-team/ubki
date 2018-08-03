<?php

namespace Wearesho\Bobra\Ubki\Data\CreditRegister;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditRegister
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'credres';
    
    public const DATE = 'redate';
    public const INN = 'inn';
    public const ID = 'reqid';
    public const DECISION = 'result';
    public const REASON = 'reqreason';
    public const ORGANIZATION = 'org';

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

    public function __construct(
        \DateTimeInterface $date,
        string $inn,
        string $id,
        Decision $decision,
        int $reason,
        ?string $organization = null
    ) {
        $this->date = $date;
        $this->inn = $inn;
        $this->id = $id;
        $this->decision = $decision;
        $this->reason = $reason;
        $this->organization = $organization;
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

    public function jsonSerialize(): array
    {
        return [
            'date' => Carbon::instance($this->getDate())->toDateString(),
            'inn' => $this->getInn(),
            'id' => $this->getId(),
            'decision' => (string)$this->getDecision(),
            'reason' => $this->getReason(),
            'organization' => $this->getOrganization()
        ];
    }
}
