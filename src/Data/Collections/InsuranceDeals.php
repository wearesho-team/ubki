<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class InsuranceDeals
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceDeals extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Elements\InsuranceDeal::class;
    }
}
