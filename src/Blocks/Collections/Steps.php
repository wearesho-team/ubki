<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Step;

/**
 * Class Steps
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Steps extends BaseCollection
{
    public function type(): string
    {
        return Step::class;
    }
}
