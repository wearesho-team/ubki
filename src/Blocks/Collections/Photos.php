<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Photo;

/**
 * Class Photos
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Photos extends BaseCollection
{
    public function type(): string
    {
        return Photo::class;
    }
}
