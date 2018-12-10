<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Elements\Step;

/**
 * Class Trace
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Trace extends BaseCollection
{
    public function type(): string
    {
        return Step::class;
    }
}
