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

    /** @var Ubki\Data\CreditDeal\Collection */
    protected $deals;

    public function __construct(Ubki\Data\CreditDeal\Collection $deals)
    {
        $this->deals = $deals;
    }

    public function getDeals(): Ubki\Data\CreditDeal\Collection
    {
        return $this->deals;
    }
}
