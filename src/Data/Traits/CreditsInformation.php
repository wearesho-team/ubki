<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditsInformation
{
    /** @var Ubki\Data\Collection\CreditDeals */
    protected $deals;

    public function getDeals(): Ubki\Data\Collection\CreditDeals
    {
        return $this->deals;
    }
}
