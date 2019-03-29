<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Contact extends BaseCollection
{
    public function type(): string
    {
        return Data\Contact::class;
    }
}
