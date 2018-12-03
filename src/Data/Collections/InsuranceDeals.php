<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class InsuranceDeals
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceDeals extends BaseCollection
{
    public function type(): string
    {
        return Elements\InsuranceDeal::class;
    }
}
