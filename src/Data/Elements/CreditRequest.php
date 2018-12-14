<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CreditRequest extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\CreditRequest
{
    use Ubki\Data\Traits\CreditRequest;

    public const TAG = 'credres';

    public function __construct(
        \DateTimeInterface $date,
        string $inn,
        string $id,
        Ubki\Dictionaries\Decision $decision,
        Ubki\Dictionaries\RequestReason $reason,
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
