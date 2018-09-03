<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Identifiers extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Identifier::class;
    }
}
