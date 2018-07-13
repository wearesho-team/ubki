<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Collection
 */
class CreditDeal extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\CreditDeal::class;
    }
}
