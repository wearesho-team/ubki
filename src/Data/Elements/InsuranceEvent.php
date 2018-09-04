<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Data\Traits;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class InsuranceEvent implements Interfaces\Insurance\Event
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
