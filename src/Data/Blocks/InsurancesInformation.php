<?php

namespace Wearesho\Bobra\Ubki\Data\BLocks;

use Wearesho\Bobra\Ubki\Infrastructure\Block;
use Wearesho\Bobra\Ubki\Data\Collections\InsuranceDeals;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\BLocks
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

    public function jsonSerialize(): array
    {
        return [
            'insuranceDeals' => $this->deals->jsonSerialize(),
        ];
    }

    public function getDeals(): InsuranceDeals
    {
        return $this->deals;
    }
}
