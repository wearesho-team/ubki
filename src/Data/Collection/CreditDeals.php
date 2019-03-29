<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditDeals
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CreditDeals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditDeal::class;
    }
}
