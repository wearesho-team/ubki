<?php

namespace Wearesho\Bobra\Ubki\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Entities\Identifier;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Collections
 */
class Identifiers extends BaseCollection
{
    public function type(): string
    {
        return Identifier::class;
    }
}
