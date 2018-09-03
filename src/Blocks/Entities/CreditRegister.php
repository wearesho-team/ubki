<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Class CreditRegister
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class CreditRegister implements Blocks\Interfaces\CreditRegister
{
    use Blocks\Traits\CreditRegister;

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
