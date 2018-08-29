<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Collections\Contacts;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class ContactsInformation extends Block
{
    public const ID = 10;

    /** @var Contacts */
    protected $contacts;

    public function __construct(Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts(): Contacts
    {
        return $this->contacts;
    }
}
