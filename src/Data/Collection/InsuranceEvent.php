<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class InsuranceEvent extends BaseCollection
{
    public function type(): string
    {
        return Data\InsuranceEvent::class;
    }
}
