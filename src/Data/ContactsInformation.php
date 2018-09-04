<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data
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
            'contacts' => array_map(function (Interfaces\Contact $contact) {
                return $contact->jsonSerialize();
            }, $this->contacts->jsonSerialize()),
        ];
    }
}
