<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References\ContactType;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Contact implements Blocks\Interfaces\Contact
{
    use Blocks\Traits\Contact;

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
