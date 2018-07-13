<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Identification extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\Identification::class;
    }
}
