<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class CreditsRegistersInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditsRegistersInformation extends Block
{
    public const ID = 4;

    /** @var Collections\CreditRegisters */
    protected $creditRequests;

    /** @var Elements\RegistryTimes|null */
    protected $registryTimes;

    public function __construct(
        Collections\CreditRegisters $creditRequests,
        Elements\RegistryTimes $registryTimes = null
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTimes = $registryTimes;
    }

    public function jsonSerialize(): array
    {
        return [
            'requests' => $this->creditRequests->jsonSerialize(),
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
