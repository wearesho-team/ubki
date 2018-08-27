<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class ErrorCollection
 * @package Wearesho\Bobra\Ubki\Push
 */
class ErrorCollection extends BaseCollection
{
    public function type(): string
    {
        return Error::class;
    }
}
