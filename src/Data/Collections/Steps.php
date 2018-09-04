<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Elements\Step;

/**
 * Class Steps
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Steps extends BaseCollection
{
    public function type(): string
    {
        return Step::class;
    }
}
