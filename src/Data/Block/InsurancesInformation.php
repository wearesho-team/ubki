<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class InsurancesInformation extends Ubki\Infrastructure\Block implements Ubki\Data\Interfaces\InsurancesInformation
{
    use Ubki\Data\Traits\InsurancesInformation;

    public const ID = 9;

    public function __construct(Ubki\Data\Collection\InsuranceDeals $deals)
    {
        $this->deals = $deals;
    }
}
