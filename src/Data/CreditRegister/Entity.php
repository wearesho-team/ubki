<?php

namespace Wearesho\Bobra\Ubki\Data\CreditRegister;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditRegister
 *
 * @property-read \DateTimeInterface $date
 * @property-read string             $inn
 * @property-read string             $id
 * @property-read Decision           $decision
 * @property-read int                $reason
 * @property-read string|null        $organization
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

    public function __construct(
        \DateTimeInterface $date,
        string $inn,
        string $id,
        Decision $decision,
        int $reason,
        ?string $organization = null
    ) {
        parent::__construct([
            'date' => $date,
            'inn' => $inn,
            'id' => $id,
            'decision' => $decision,
            'reason' => $reason,
            'organization' => $organization
        ]);
    }

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
}
