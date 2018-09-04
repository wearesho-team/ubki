<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\References\ContactType;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Contact implements Data\Interfaces\Contact
{
    use Data\Traits\Contact;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        ContactType $type,
        ?string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }
}
