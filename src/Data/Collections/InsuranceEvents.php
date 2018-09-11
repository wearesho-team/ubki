<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Data\Elements\InsuranceEvent;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class InsuranceEvents
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceEvents extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return InsuranceEvent::class;
    }
}
