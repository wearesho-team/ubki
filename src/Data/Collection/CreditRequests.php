<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditRequests
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CreditRequests extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditRequest::class;
    }
}
