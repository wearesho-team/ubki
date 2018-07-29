<?php

namespace Wearesho\Bobra\Ubki\Data\Step;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Step
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
