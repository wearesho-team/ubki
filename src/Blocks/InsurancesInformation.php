<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Collections\InsuranceDeals;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class InsurancesInformation extends Block
{
    public const ID = 9;

    /** @var InsuranceDeals */
    protected $deals;

    public function __construct(InsuranceDeals $deals)
    {
        $this->deals = $deals;
    }

    public function getDeals(): InsuranceDeals
    {
        return $this->deals;
    }
}
