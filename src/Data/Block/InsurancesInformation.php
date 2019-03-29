<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class InsurancesInformation extends Ubki\Block
{
    public const ID = 9;

    /** @var Ubki\Data\Collection\InsuranceDeal */
    protected $deals;

    public function __construct(Ubki\Data\Collection\InsuranceDeal $deals)
    {
        $this->deals = $deals;
    }

    public function getDeals(): Ubki\Data\Collection\InsuranceDeal
    {
        return $this->deals;
    }
}
