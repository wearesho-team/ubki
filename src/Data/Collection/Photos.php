<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Photos
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Photos extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Photo::class;
    }
}
