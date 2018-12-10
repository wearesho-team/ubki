<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRequestsInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditsRequestsInformation extends Ubki\Infrastructure\Block
{
    public const ID = 4;

    /** @var Ubki\Data\Collections\CreditRequests */
    protected $creditRequests;

    /** @var Ubki\Data\Elements\RegistryTimes|null */
    protected $registryTimes;

    public function __construct(
        Ubki\Data\Collections\CreditRequests $creditRequests,
        Ubki\Data\Elements\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }

    public function getCreditRequests(): Ubki\Data\Collections\CreditRequests
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Ubki\Data\Elements\RegistryTimes
    {
        return $this->registryTimes;
    }
}
