<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Class CreditRegister
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CreditRegister implements Data\Interfaces\CreditRegister
{
    use Data\Traits\CreditRegister;

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
}
