<?php

namespace Wearesho\Bobra\Ubki\Push\Error;

use Wearesho\BaseCollection;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Push\Error
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
