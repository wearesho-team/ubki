<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class CreditsRegistersInformation
 * @package Wearesho\Bobra\Ubki\Data
 */
class CreditsRegistersInformation extends Block
{
    public const ID = 4;

    /** @var Collections\CreditRegisters */
    protected $creditRequests;

    /** @var null|Elements\RegistryTimes */
    protected $registryTimes;

    public function __construct(
        Collections\CreditRegisters $creditRequests,
        ?Elements\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }

    public function jsonSerialize(): array
    {
        return [
            'requests' => array_map(function (Interfaces\CreditRegister $creditRegister) {
                return $creditRegister->jsonSerialize();
            }, $this->creditRequests->jsonSerialize()),
            'times' => $this->registryTimes->jsonSerialize(),
        ];
    }

    public function getCreditRequests(): Collections\CreditRegisters
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Elements\RegistryTimes
    {
        return $this->registryTimes;
    }
}
