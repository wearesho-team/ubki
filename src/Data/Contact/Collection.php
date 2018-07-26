<?php

namespace Wearesho\Bobra\Ubki\Data\Contact;

use Wearesho\Bobra\Ubki;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\Contact
 */
class Collection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
