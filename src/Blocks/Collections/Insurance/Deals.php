<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections\Insurance;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Deals
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Deals extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Insurance\Deal::class;
    }
}
