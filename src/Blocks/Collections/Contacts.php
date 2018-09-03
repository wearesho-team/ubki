<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Contacts
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Contacts extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\Contact::class;
    }
}
