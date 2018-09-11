<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Addresses extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\Address::class;
    }
    public function hasWrapper(): bool
    {
        return false;
    }
}
