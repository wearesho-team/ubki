<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Work extends BaseCollection
{
    public function type(): string
    {
        return Data\Work::class;
    }
}
