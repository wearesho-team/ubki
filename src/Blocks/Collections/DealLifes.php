<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class DealLifes
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class DealLifes extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\DealLife::class;
    }
}
