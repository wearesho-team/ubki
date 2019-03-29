<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class LinkedPerson extends BaseCollection
{
    public function type(): string
    {
        return Data\LinkedPerson::class;
    }
}
