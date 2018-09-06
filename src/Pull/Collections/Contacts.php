<?php

namespace Wearesho\Bobra\Ubki\Pull\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Pull\Elements\Contact;

/**
 * Class Contacts
 * @package Wearesho\Bobra\Ubki\Pull\Collections
 */
class Contacts extends BaseCollection implements ElementInterface
{
    public const TAG = 'contacts';

    public function type(): string
    {
        return Contact::class;
    }

    public function tag(): string
    {
        return static::TAG;
    }
}
