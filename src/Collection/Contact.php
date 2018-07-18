<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Contact extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Element\Contact::class;
    }
}
