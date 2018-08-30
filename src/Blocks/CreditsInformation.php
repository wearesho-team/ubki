<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Blocks
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
}
