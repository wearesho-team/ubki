<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Step extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\Step::class;
    }
}
