<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Contacts
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Contacts extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Contact::class;
    }
}
