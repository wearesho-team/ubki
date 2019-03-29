<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRequestsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditsRequestsInformation extends Ubki\Block
{
    public const ID = 4;

    /** @var Ubki\Data\Collection\CreditRequest */
    protected $creditRequests;

    /** @var Ubki\Data\RegistryTimes|null */
    protected $registryTimes;

    public function __construct(
        Ubki\Data\Collection\CreditRequest $creditRequests,
        Ubki\Data\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }

    public function getCreditRequests(): Ubki\Data\Collection\CreditRequest
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Ubki\Data\RegistryTimes
    {
        return $this->registryTimes;
    }
}
