<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class ContactsInformation extends Ubki\Infrastructure\Block implements Ubki\Data\Interfaces\ContactsInformation
{
    public const ID = 10;

    /** @var Ubki\Data\Collections\Contacts */
    protected $contacts;

    public function __construct(Ubki\Data\Collections\Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts(): Ubki\Data\Collections\Contacts
    {
        return $this->contacts;
    }
}
