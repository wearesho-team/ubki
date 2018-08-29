<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Address::class;
    }
}
