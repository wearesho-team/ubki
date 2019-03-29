<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Element;

/**
 * Class InsuranceDeals
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class InsuranceDeals extends BaseCollection
{
    public function type(): string
    {
        return Element\InsuranceDeal::class;
    }
}
