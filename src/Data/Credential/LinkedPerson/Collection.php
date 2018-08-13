<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
