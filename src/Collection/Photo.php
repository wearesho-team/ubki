<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Photo extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\Photo::class;
    }
}
