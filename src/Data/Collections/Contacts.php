<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Contacts
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Contacts extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\Contact::class;
    }
}
