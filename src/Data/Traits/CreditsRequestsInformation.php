<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditsRequestsInformation
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditsRequestsInformation
{
    /** @var Ubki\Data\Collection\CreditRequests */
    protected $creditRequests;

    /** @var Ubki\Data\Element\RegistryTimes|null */
    protected $registryTimes;

    public function getCreditRequests(): Ubki\Data\Collection\CreditRequests
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Ubki\Data\Element\RegistryTimes
    {
        return $this->registryTimes;
    }
}
