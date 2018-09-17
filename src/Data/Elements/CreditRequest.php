<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CreditRequest extends Infrastructure\Element implements Data\Interfaces\CreditRegister
{
    use Data\Traits\CreditRegister;

    public function __construct(
        \DateTimeInterface $date,
        string $inn,
        string $id,
        Dictionaries\Decision $decision,
        Dictionaries\RequestReason $reason,
        string $organization = null
    ) {
        $this->date = $date;
        $this->inn = $inn;
        $this->id = $id;
        $this->decision = $decision;
        $this->reason = $reason;
        $this->organization = $organization;

        parent::__construct();
    }
}
