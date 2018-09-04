<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class LinkedPersons
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class LinkedPersons extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\LinkedPerson::class;
    }
}
