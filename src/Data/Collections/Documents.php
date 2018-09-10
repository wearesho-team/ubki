<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Documents extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\Document::class;
    }

    public function hasWrapper(): bool
    {
        return false;
    }
}
