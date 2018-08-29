<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Blocks
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
}
