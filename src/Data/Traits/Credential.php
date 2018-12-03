<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Credential
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Credential
{
    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Data\Collections\IdentifiedPersons */
    protected $identifiers;

    /** @var Ubki\Data\Collections\Documents */
    protected $documents;

    /** @var Ubki\Data\Collections\Addresses */
    protected $addresses;

    /** @var string|null */
    protected $inn;

    /** @var Ubki\Data\Collections\Works|null */
    protected $works;

    /** @var Ubki\Data\Collections\Photos|null */
    protected $photos;

    /** @var Ubki\Data\Collections\LinkedPersons|null */
    protected $linkedPersons;

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\Credential::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\Credential::NAME => $this->name,
            Ubki\Data\Interfaces\Credential::PATRONYMIC => $this->patronymic,
            Ubki\Data\Interfaces\Credential::SURNAME => $this->surname,
            Ubki\Data\Interfaces\Credential::BIRTH_DATE => $this->birthDate,
            Ubki\Data\Interfaces\Credential::INN => $this->inn,
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
        return Ubki\Data\Interfaces\Credential::TAG;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
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

    public function getIdentifiers(): Ubki\Data\Collections\IdentifiedPersons
    {
        return $this->identifiers;
    }

    public function getDocuments(): Ubki\Data\Collections\Documents
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Data\Collections\Addresses
    {
        return $this->addresses;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getWorks(): ?Ubki\Data\Collections\Works
    {
        return $this->works;
    }

    public function getPhotos(): ?Ubki\Data\Collections\Photos
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?Ubki\Data\Collections\LinkedPersons
    {
        return $this->linkedPersons;
    }
}
