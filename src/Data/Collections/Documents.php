<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Documents extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Document::class;
    }
}
