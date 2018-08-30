<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class CreditDeals
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class CreditDeals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditDeal::class;
    }
}
