<?php

namespace Wearesho\Bobra\Ubki\Collections;

use Wearesho\Bobra\Ubki;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Collections
 */
class Addresses extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Entities\Address::class;
    }
}
