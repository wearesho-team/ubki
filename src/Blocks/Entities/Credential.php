<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Credential implements Blocks\Interfaces\Credential
{
    use Blocks\Traits\Credential;

    public function __construct(
        References\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Blocks\Collections\Identifiers $identifiers,
        Blocks\Collections\Documents $documents,
        Blocks\Collections\Addresses $addresses,
        ?string $inn = null,
        ?Blocks\Collections\Works $works = null,
        ?Blocks\Collections\Photos $photos = null,
        ?Blocks\Collections\LinkedPersons $linkedPersons = null
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
