<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait InsurancesInformation
{
    /** @var Ubki\Data\Collection\InsuranceDeals */
    protected $deals;

    public function getDeals(): Ubki\Data\Collection\InsuranceDeals
    {
        return $this->deals;
    }
}
