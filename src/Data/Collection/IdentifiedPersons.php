<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class IdentifiedPersons
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class IdentifiedPersons extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\IdentifiedPerson::class;
    }
}
