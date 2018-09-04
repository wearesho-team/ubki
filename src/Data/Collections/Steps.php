<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Elements\Step;

/**
 * Class Steps
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Steps extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Step::class;
    }
}
