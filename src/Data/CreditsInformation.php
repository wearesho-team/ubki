<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data
 */
class CreditsInformation extends Block
{
    public const ID = 2;

    /** @var Collections\CreditDeals */
    protected $creditCollection;

    public function __construct(Collections\CreditDeals $creditCollection)
    {
        $this->creditCollection = $creditCollection;
    }

    public function getCreditCollection(): Collections\CreditDeals
    {
        return $this->creditCollection;
    }

    public function jsonSerialize(): array
    {
        return [
            'credits' => array_map(function (Interfaces\CreditDeal $credit) {
                return $credit->jsonSerialize();
            }, $this->creditCollection->jsonSerialize()),
        ];
    }
}
