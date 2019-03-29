<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CreditsRequestsInformation
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditsRequestsInformation extends Ubki\ElementInterface
{
    public function getCreditRequests(): Ubki\Data\Collection\CreditRequests;

    public function getRegistryTimes(): ?Ubki\Data\Element\RegistryTimes;
}
