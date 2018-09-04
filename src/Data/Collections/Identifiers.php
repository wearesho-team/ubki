<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Identifiers extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Identifier::class;
    }
}
