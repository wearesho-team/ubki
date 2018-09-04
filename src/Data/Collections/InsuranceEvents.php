<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class InsuranceEvents
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceEvents extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Insurance\Event::class;
    }
}
