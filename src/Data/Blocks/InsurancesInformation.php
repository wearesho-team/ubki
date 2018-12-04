<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class InsurancesInformation extends Ubki\Infrastructure\Block
{
    public const ID = 9;

    /** @var Ubki\Data\Collections\InsuranceDeals */
    protected $deals;

    public function __construct(Ubki\Data\Collections\InsuranceDeals $deals)
    {
        $this->deals = $deals;
    }

    public function jsonSerialize(): array
    {
        return [
            'insuranceDeals' => $this->deals->jsonSerialize(),
        ];
    }

    public function getDeals(): Ubki\Data\Collections\InsuranceDeals
    {
        return $this->deals;
    }
}
