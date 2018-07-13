<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Collection
 */
class DealLife extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\DealLife::class;
    }
}
