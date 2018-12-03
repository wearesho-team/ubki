<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Credential extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Credential
{
    use Ubki\Data\Traits\Credential;

    public function __construct(
        Ubki\Dictionaries\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Data\Collections\IdentifiedPersons $identifiers,
        Ubki\Data\Collections\Documents $documents,
        Ubki\Data\Collections\Addresses $addresses,
        string $inn = null,
        Ubki\Data\Collections\Works $works = null,
        Ubki\Data\Collections\Photos $photos = null,
        Ubki\Data\Collections\LinkedPersons $linkedPersons = null
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
