<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRegistersInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditsRegistersInformation extends Ubki\Infrastructure\Block
{
    public const ID = 4;

    /** @var Ubki\Data\Collections\CreditRegisters */
    protected $creditRequests;

    /** @var Ubki\Data\Elements\RegistryTimes|null */
    protected $registryTimes;

    public function __construct(
        Ubki\Data\Collections\CreditRegisters $creditRequests,
        Ubki\Data\Elements\RegistryTimes $registryTimes = null
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

    public function getCreditRequests(): Ubki\Data\Collections\CreditRegisters
    {
        return $this->creditRequests;
    }

    public function getRegistryTimes(): ?Ubki\Data\Elements\RegistryTimes
    {
        return $this->registryTimes;
    }
}
