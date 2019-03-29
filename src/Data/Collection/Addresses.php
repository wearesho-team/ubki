<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Address::class;
    }
}
