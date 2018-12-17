<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CreditsInformation
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditsInformation extends Ubki\Infrastructure\ElementInterface
{
    public function getDeals(): Ubki\Data\Collection\CreditDeals;
}
