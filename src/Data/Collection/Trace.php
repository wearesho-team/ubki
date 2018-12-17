<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Element\Step;

/**
 * Class Trace
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Trace extends BaseCollection
{
    public function type(): string
    {
        return Step::class;
    }
}
