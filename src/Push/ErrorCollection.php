<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Addresses
 * @package Wearesho\Bobra\Ubki\Push\Error
 */
class ErrorCollection extends BaseCollection
{
    public function type(): string
    {
        return Error::class;
    }
}
