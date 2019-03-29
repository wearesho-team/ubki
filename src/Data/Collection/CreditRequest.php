<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CreditRequest extends BaseCollection
{
    public function type(): string
    {
        return Data\CreditRequest::class;
    }
}
