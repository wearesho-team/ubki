<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Address;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Address::class;
    }
}
