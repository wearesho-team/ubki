<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditDeals
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class CreditDeals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditDeal::class;
    }
}
