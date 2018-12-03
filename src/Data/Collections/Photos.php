<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Photos
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Photos extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Photo::class;
    }
}
