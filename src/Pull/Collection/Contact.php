<?php

namespace Wearesho\Bobra\Ubki\Pull\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Collection
 */
class Contact extends BaseCollection
{
    public const TAG = 'contacts';

    public function type(): string
    {
        return Ubki\Pull\Element\Contact::class;
    }
}
