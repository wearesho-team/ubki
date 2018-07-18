<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Credit
 * @package Wearesho\Bobra\Ubki\Block
 */
class Credit extends Ubki\Block
{
    public const ID = 2;

    protected $deals;

    // todo: refactor after CreditDeal entity implementation
    public function __construct($deals)
    {
        $this->deals = $deals;
    }

    public function getDeals()
    {
        return $this->deals;
    }
}
