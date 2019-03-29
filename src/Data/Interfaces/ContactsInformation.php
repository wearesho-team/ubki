<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface ContactsInformation extends Ubki\ElementInterface
{
    public function getContacts(): Ubki\Data\Collection\Contacts;
}
