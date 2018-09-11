<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Trait Credential
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Credential
{
    /** @var Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Collections\IdentifiedPersons */
    protected $identifiers;

    /** @var Collections\Documents */
    protected $documents;

    /** @var Collections\Addresses */
    protected $addresses;

    /** @var string|null */
    protected $inn;

    /** @var Collections\Works|null */
    protected $works;

    /** @var Collections\Photos|null */
    protected $photos;

    /** @var Collections\LinkedPersons|null */
    protected $linkedPersons;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Credential::LANGUAGE => $this->language,
            Interfaces\Credential::NAME => $this->name,
            Interfaces\Credential::PATRONYMIC => $this->patronymic,
            Interfaces\Credential::SURNAME => $this->surname,
            Interfaces\Credential::BIRTH_DATE => $this->birthDate,
            Interfaces\Credential::INN => $this->inn,
            'identifiers' =>  $this->identifiers->jsonSerialize(),
            'linkedPersons' => $this->linkedPersons ? $this->linkedPersons->jsonSerialize() : null,
            'works' => $this->works ? $this->works->jsonSerialize() : null,
            'documents' => $this->documents->jsonSerialize(),
            'addresses' => $this->addresses->jsonSerialize(),
            'photos' => $this->photos ? $this->photos->jsonSerialize() : null,
        ];
    }

    public function tag(): string
    {
        return Interfaces\Credential::TAG;
    }

    public function getLanguage(): Dictionaries\Language
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getIdentifiers(): Collections\IdentifiedPersons
    {
        return $this->identifiers;
    }

    public function getDocuments(): Collections\Documents
    {
        return $this->documents;
    }

    public function getAddresses(): Collections\Addresses
    {
        return $this->addresses;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getWorks(): ?Collections\Works
    {
        return $this->works;
    }

    public function getPhotos(): ?Collections\Photos
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?Collections\LinkedPersons
    {
        return $this->linkedPersons;
    }
}
