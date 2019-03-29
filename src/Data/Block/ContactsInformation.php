<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class ContactsInformation extends Ubki\Block implements Ubki\Data\Interfaces\ContactsInformation
{
    use Ubki\Data\Traits\ContactsInformation;

    public const ID = 10;

    public function __construct(Ubki\Data\Collection\Contacts $contacts)
    {
        $this->contacts = $contacts;
    }
}
