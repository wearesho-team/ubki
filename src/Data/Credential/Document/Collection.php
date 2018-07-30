<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Document;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Credential\Document
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
