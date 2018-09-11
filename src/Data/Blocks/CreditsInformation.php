<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Infrastructure\Block;
use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
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
            'credits' => $this->creditCollection->jsonSerialize(),
        ];
    }
}
