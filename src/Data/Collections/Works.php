<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Works
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Works extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\Work::class;
    }

    public function hasWrapper(): bool
    {
        return false;
    }
}
