<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Work extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\Work::class;
    }
}
