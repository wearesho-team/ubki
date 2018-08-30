<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class InsuranceEvent implements Blocks\Interfaces\InsuranceEvent
{
    use Blocks\Traits\InsuranceEvent;

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
