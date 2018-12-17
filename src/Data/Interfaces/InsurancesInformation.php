<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface InsurancesInformation extends Ubki\Infrastructure\ElementInterface
{
    public function getDeals(): Ubki\Data\Collection\InsuranceDeals;
}
