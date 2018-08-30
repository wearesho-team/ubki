<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class CreditsRegistersInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class CreditsRegistersInformation extends Block
{
    public const ID = 4;

    /** @var Collections\CreditRegisters */
    protected $creditRequests;

    /** @var null|Entities\RegistryTimes */
    protected $registryTimes;

    public function __construct(
        Collections\CreditRegisters $creditRequests,
        ?Entities\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }

    public function getCreditRequests(): Collections\CreditRegisters
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Entities\RegistryTimes
    {
        return $this->registryTimes;
    }
}
