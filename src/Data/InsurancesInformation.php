<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Collections\InsuranceDeals;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data
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
            'insuranceDeals' => array_map(function (Interfaces\Insurance\Deal $insuranceDeal) {
                return $insuranceDeal->jsonSerialize();
            }, $this->deals->jsonSerialize()),
        ];
    }

    public function getDeals(): InsuranceDeals
    {
        return $this->deals;
    }
}
