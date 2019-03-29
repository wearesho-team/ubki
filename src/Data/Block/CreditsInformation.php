<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditsInformation extends Ubki\Block
{
    public const ID = 2;

    /** @var Ubki\Data\Collection\CreditDeal */
    protected $deals;

    public function __construct(Ubki\Data\Collection\CreditDeal $creditCollection)
    {
        $this->deals = $creditCollection;
    }

    public function getDeals(): Ubki\Data\Collection\CreditDeal
    {
        return $this->deals;
    }
}
