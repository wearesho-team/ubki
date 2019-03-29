<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Address extends BaseCollection
{
    public function type(): string
    {
        return Data\Address::class;
    }
}
