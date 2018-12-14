<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditRequests
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class CreditRequests extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditRequest::class;
    }
}
