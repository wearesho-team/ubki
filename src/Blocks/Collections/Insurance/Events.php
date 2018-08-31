<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections\Insurance;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Events
 * @package Wearesho\Bobra\Ubki\Blocks\Collections\Insurance
 */
class Events extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Insurance\Event::class;
    }
}
