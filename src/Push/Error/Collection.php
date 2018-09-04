<?php

namespace Wearesho\Bobra\Ubki\Push\Error;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Push\Error
 */
class Collection extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
