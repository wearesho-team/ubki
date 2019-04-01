<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data
 */
class CreditRequest extends Ubki\Element
{
    public const TAG = 'credres';

    public const DATE = 'redate';
    public const INN = 'inn';
    public const ID = 'reqid';
    public const DECISION = 'result';
    public const DECISION_REF = 'resultref';
    public const REASON = 'reqreason';
    public const ORGANIZATION = 'org';

    /** @var \DateTimeInterface */
    protected $date;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $id;

    /** @var Ubki\Dictionary\Decision */
    protected $decision;

    /** @var Ubki\Dictionary\RequestReason */
    protected $reason;

    /** @var string|null */
    protected $organization;

    public function __construct(
        \DateTimeInterface $date,
        string $inn,
        string $id,
        Ubki\Dictionary\Decision $decision,
        Ubki\Dictionary\RequestReason $reason,
        string $organization = null
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

    public function getDecision(): Ubki\Dictionary\Decision
    {
        return $this->decision;
    }

    public function getReason(): Ubki\Dictionary\RequestReason
    {
        return $this->reason;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
