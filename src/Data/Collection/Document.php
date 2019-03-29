<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Document extends BaseCollection
{
    public function type(): string
    {
        return Data\Document::class;
    }
}
