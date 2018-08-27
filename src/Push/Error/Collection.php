<?php

namespace Wearesho\Bobra\Ubki\Push\Error;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Push\Error
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
