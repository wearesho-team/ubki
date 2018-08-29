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

    protected $registryTrim;

    public function __construct(Collections\CreditRegisters $creditRequests, $registryTrim)
    {
        $this->creditRequests = $creditRequests;
        $this->registryTrim = $registryTrim;
    }

    public function getCreditRequests(): Collections\CreditRegisters
    {
        return $this->creditRequests;
    }

    public function getRegistryTrim()
    {
        return $this->registryTrim;
    }
}
