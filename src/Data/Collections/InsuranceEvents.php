<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Elements\InsuranceEvent;

/**
 * Class InsuranceEvents
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceEvents extends BaseCollection
{
    public function type(): string
    {
        return InsuranceEvent::class;
    }
}
