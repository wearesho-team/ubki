<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Photo;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Credential\Photo
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
