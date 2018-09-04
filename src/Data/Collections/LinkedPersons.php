<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class LinkedPersons
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class LinkedPersons extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\LinkedPerson::class;
    }
}
