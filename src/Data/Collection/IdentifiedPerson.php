<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class IdentifiedPerson extends BaseCollection
{
    public function type(): string
    {
        return Data\IdentifiedPerson::class;
    }
}
