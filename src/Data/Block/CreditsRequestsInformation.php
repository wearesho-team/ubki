<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRequestsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditsRequestsInformation extends Ubki\Infrastructure\Block implements
    Ubki\Data\Interfaces\CreditsRequestsInformation
{
    use Ubki\Data\Traits\CreditsRequestsInformation;

    public const ID = 4;

    public function __construct(
        Ubki\Data\Collection\CreditRequests $creditRequests,
        Ubki\Data\Element\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }
}
