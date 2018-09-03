<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities\Insurance;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;
use Wearesho\Bobra\Ubki\Blocks\Traits;

/**
 * Class Event
 * @package Wearesho\Bobra\Ubki\Blocks\Entities\Insurance
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
