<?php

namespace Wearesho\Bobra\Ubki\Data\Elements\Insurance;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Data\Traits;

/**
 * Class Event
 * @package Wearesho\Bobra\Ubki\Data\Elements\Insurance
 */
class Event implements Interfaces\Insurance\Event
{
    use Traits\Insurance\Event;

    public function __construct(
        \DateTimeInterface $requestDate,
        int $decision,
        \DateTimeInterface $decisionDate
    ) {
        $this->requestDate = $requestDate;
        $this->decision = $decision;
        $this->decisionDate = $decisionDate;
    }
}
