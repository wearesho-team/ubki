<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class Credential extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Credential
{
    use Ubki\Data\Traits\Credential;

    public const TAG = 'cki';

    public function __construct(
        Ubki\Dictionary\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Data\Collection\IdentifiedPersons $identifiers,
        Ubki\Data\Collection\Documents $documents,
        Ubki\Data\Collection\Addresses $addresses,
        string $inn = null,
        Ubki\Data\Collection\Works $works = null,
        Ubki\Data\Collection\Photos $photos = null,
        Ubki\Data\Collection\LinkedPersons $linkedPersons = null
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
