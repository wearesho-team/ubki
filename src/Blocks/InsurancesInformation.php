<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Collections\Insurance;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class InsurancesInformation extends Block
{
    public const ID = 9;

    /** @var Insurance\Deals */
    protected $deals;

    public function __construct(Insurance\Deals $deals)
    {
        $this->deals = $deals;
    }

    public function getDeals(): Insurance\Deals
    {
        return $this->deals;
    }
}
