<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Address;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Credential\Address
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
