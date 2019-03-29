<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditsInformation extends Ubki\Infrastructure\Block implements Ubki\Data\Interfaces\CreditsInformation
{
    use Ubki\Data\Traits\CreditsInformation;

    public const ID = 2;

    public function __construct(Ubki\Data\Collection\CreditDeals $creditCollection)
    {
        $this->deals = $creditCollection;
    }
}
