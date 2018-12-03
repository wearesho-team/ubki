<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class IdentificationPerson extends Person implements Data\Interfaces\IdentificationPerson
{
    use Data\Traits\IdentificationPerson;

    public function __construct(
        string $name = null,
        string $inn = null,
        string $surname = null,
        string $patronymic = null,
        \DateTimeInterface $birthDate = null,
        string $organization = null
    ) {
        $this->inn = $inn;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->birthDate = $birthDate;
        $this->organization = $organization;

        parent::__construct($name);
    }
}
