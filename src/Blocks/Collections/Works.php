<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Works
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Works extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Work::class;
    }
}
