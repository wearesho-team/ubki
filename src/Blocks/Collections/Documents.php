<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Documents extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Document::class;
    }
}
