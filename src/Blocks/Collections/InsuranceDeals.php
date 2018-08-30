<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class InsuranceDeals
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class InsuranceDeals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\InsuranceDeal::class;
    }
}
