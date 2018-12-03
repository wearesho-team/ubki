<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Works
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Works extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Work::class;
    }
}
