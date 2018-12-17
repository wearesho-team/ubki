<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Element\InsuranceEvent;

/**
 * Class InsuranceEvents
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class InsuranceEvents extends BaseCollection
{
    public function type(): string
    {
        return InsuranceEvent::class;
    }
}
