<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class CreditRequest extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\CreditRequest
{
    use Ubki\Data\Traits\CreditRequest;

    public const TAG = 'credres';

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
}
