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

    /** @var Ubki\Data\Contact\Collection */
    protected $contacts;

    public function __construct(Ubki\Data\Contact\Collection $contacts)
    {
        $this->contacts = $contacts;
    }

    public function getContacts(): Ubki\Data\Contact\Collection
    {
        return $this->contacts;
    }
}
