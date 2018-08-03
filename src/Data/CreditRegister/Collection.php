<?php

namespace Wearesho\Bobra\Ubki\Data\CreditRegister;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\CreditRegister
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
