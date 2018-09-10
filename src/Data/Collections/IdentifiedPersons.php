<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class IdentifiedPersons
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class IdentifiedPersons extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\IdentifiedPerson::class;
    }

    public function hasWrapper(): bool
    {
        return false;
    }
}
