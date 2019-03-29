<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class DealLife extends BaseCollection
{
    public function type(): string
    {
        return Data\DealLife::class;
    }
}
