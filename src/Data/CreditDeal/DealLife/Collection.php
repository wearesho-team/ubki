<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
