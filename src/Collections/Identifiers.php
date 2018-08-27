<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier;

use Wearesho\Bobra\Ubki;

/**
 * Class Identifiers
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier
 */
class Identifiers extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Identifier::class;
    }
}
