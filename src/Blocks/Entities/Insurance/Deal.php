<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities\Insurance;

use Wearesho\Bobra\Ubki\Blocks\Collections;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;
use Wearesho\Bobra\Ubki\Blocks\Traits;

/**
 * Class Deal
 * @package Wearesho\Bobra\Ubki\Blocks\Entities\Insurance
 */
class Deal implements Interfaces\Insurance\Deal
{
    use Traits\Insurance\Deal;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        int $type,
        int $status,
        ?Collections\Insurance\Events $events = null,
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
