<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data
 */
class CreditRequest implements Ubki\Contract\Data\CreditRequest, \JsonSerializable
{
    use Makeable, Tagable;

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
        string $organization = \null
    ) {
        Ubki\Validator::INN()->validate($inn);
        Ubki\Validator::TEXT_40()->validate($id);

        $this->date = $date;
        $this->inn = $inn;
        $this->id = $id;
        $this->decision = $decision;
        $this->reason = $reason;
        $this->organization = $organization;
    }

    public function jsonSerialize(): array
    {
        return [
            'date' => Carbon::make($this->date),
            'inn' => $this->inn,
            'id' => $this->id,
            'decision' => $this->decision,
            'reason' => $this->reason,
            'organization' => $this->organization,
        ];
    }

    public static function tag(): string
    {
        return 'credres';
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
