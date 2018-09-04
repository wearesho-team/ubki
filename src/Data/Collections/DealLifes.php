<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class DealLifes
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class DealLifes extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\DealLife::class;
    }
}
