<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Contact extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Contact
{
    use Ubki\Data\Traits\Contact;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Ubki\Dictionaries\ContactType $type,
        string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }
}
