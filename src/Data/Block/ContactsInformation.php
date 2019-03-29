<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactsInformation
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class ContactsInformation extends Ubki\Block
{
    public const ID = 10;

    /** @var Ubki\Data\Collection\Contact */
    protected $contacts;

    public function __construct(Ubki\Data\Collection\Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts(): Ubki\Data\Collection\Contact
    {
        return $this->contacts;
    }
}
