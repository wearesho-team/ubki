<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Documents extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Document::class;
    }
}
