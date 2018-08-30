<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class InsuranceEvents
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class InsuranceEvents extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\InsuranceEvent::class;
    }
}
