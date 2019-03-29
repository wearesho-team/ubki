<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CreditDeal extends BaseCollection
{
    public function type(): string
    {
        return Data\CreditDeal::class;
    }
}
