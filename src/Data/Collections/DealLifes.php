<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class DealLifes
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class DealLifes extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\DealLife::class;
    }
}
