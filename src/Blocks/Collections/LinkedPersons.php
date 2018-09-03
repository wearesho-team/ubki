<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class LinkedPersons
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class LinkedPersons extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\LinkedPerson::class;
    }
}
