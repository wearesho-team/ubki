<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries\ContactType;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Contact extends Infrastructure\Element implements Data\Interfaces\Contact
{
    use Data\Traits\Contact;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        ContactType $type,
        string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;

        parent::__construct();
    }
}
