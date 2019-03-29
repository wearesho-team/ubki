<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
abstract class IdentifiedPerson extends Person implements Ubki\Data\Interfaces\IdentifiedPerson
{
    use Ubki\Data\Traits\IdentifiedPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;

        parent::__construct($name);
    }
}
