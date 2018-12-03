<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Infrastructure\BaseCollection;

/**
 * Class ErrorCollection
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class ErrorCollection extends BaseCollection
{
    public function type(): string
    {
        return Error::class;
    }
}
