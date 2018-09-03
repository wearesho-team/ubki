<?php

namespace Wearesho\Bobra\Ubki\Push\Error;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Push\Error
 *
 * @deprecated
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
