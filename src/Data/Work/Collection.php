<?php

namespace Wearesho\Bobra\Ubki\Data\Work;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Work
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
