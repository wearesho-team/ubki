<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class LinkedPersons
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class LinkedPersons extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\LinkedPerson::class;
    }
}
