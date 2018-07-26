<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Address extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Element\Address::class;
    }
}
