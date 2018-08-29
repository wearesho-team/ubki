<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Work;

/**
 * Class Works
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Works extends BaseCollection
{
    public function type(): string
    {
        return Work::class;
    }
}
