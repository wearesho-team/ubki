<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Credential extends Infrastructure\Element implements Data\Interfaces\Credential
{
    use Data\Traits\Credential;

    public function __construct(
        Dictionaries\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Data\Collections\IdentifiedPersons $identifiers,
        Data\Collections\Documents $documents,
        Data\Collections\Addresses $addresses,
        ?string $inn = null,
        ?Data\Collections\Works $works = null,
        ?Data\Collections\Photos $photos = null,
        ?Data\Collections\LinkedPersons $linkedPersons = null
    ) {
        $this->language = $language;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->identifiers = $identifiers;
        $this->documents = $documents;
        $this->addresses = $addresses;
        $this->inn = $inn;
        $this->works = $works;
        $this->photos = $photos;
        $this->linkedPersons = $linkedPersons;
    }
}
