<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class DealLifes
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class DealLifes extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\DealLife::class;
    }
}
