<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRegister
 * @package Wearesho\Bobra\Ubki\Block
 */
class CreditRegister extends Ubki\Block
{
    public const ID = 4;

    protected $creditRequests;

    protected $registryTrim;

    // todo: refactor after implementing Credres element
    // todo: refactor after implementing Reestrtrim element
    public function __construct($creditRequests, $registryTrim)
    {
        $this->creditRequests = $creditRequests;
        $this->registryTrim = $registryTrim;
    }

    public function getCreditRequests()
    {
        return $this->creditRequests;
    }

    public function getRegistryTrim()
    {
        return $this->registryTrim;
    }
}
