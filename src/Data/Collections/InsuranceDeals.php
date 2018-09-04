<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class InsuranceDeals
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class InsuranceDeals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Insurance\Deal::class;
    }
}
