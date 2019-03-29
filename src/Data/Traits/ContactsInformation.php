<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait ContactsInformation
{
    /** @var Ubki\Data\Collection\Contacts */
    protected $contacts;

    public function getContacts(): Ubki\Data\Collection\Contacts
    {
        return $this->contacts;
    }
}
