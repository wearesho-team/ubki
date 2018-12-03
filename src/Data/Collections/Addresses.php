<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Address::class;
    }
}
