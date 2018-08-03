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

    /** @var Ubki\Data\CreditRegister\Collection */
    protected $creditRequests;

    protected $registryTrim;

    // todo: refactor after implementing Reestrtrim element
    public function __construct(
        Ubki\Data\CreditRegister\Collection $creditRequests,
        $registryTrim
    ) {
        $this->creditRequests = $creditRequests;
        $this->registryTrim = $registryTrim;
    }

    public function getCreditRequests(): Ubki\Data\CreditRegister\Collection
    {
        return $this->creditRequests;
    }

    public function getRegistryTrim()
    {
        return $this->registryTrim;
    }
}
