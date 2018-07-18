<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Block
 */
class Contact extends Ubki\Block
{
    public const ID = 10;

    protected $contacts;

    // todo: refactor after Contact collection and Contact Entity implementation
    public function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts()
    {
        return $this->contacts;
    }
}
