<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditsInformation extends Ubki\Infrastructure\Block
{
    public const ID = 2;

    /** @var Ubki\Data\Collections\CreditDeals */
    protected $creditCollection;

    public function __construct(Ubki\Data\Collections\CreditDeals $creditCollection)
    {
        $this->creditCollection = $creditCollection;
    }

    public function getCreditCollection(): Ubki\Data\Collections\CreditDeals
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
