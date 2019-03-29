<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Photo extends BaseCollection
{
    public function type(): string
    {
        return Data\Photo::class;
    }
}
