<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class ContactsInformation extends Block
{
    public const ID = 10;

    /** @var Collections\Contacts */
    protected $contacts;

    public function __construct(Collections\Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts(): Collections\Contacts
    {
        return $this->contacts;
    }

    public function jsonSerialize(): array
    {
        return [
            'contacts' =>  $this->contacts->jsonSerialize(),
        ];
    }
}
