<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Contact extends BaseCollection
{
    public function type(): string
    {
        return Ubki\Element\Contact::class;
    }
}
