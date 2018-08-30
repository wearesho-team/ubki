<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class InsuranceDeal implements Blocks\Interfaces\InsuranceDeal
{
    use Blocks\Traits\InsuranceDeal;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        int $type,
        int $status,
        ?Blocks\Collections\InsuranceEvents $events = null,
        ?\DateTimeInterface $actualEndDate = null
    ) {
        $this->inn = $inn;
        $this->id = $id;
        $this->informationDate = $informationDate;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->actualEndDate = $actualEndDate;
        $this->type = $type;
        $this->status = $status;
        $this->events = $events;
    }
}
