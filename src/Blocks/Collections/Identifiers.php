<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Identifier;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Identifiers extends BaseCollection
{
    public function type(): string
    {
        return Identifier::class;
    }
}
