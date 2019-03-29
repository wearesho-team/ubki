<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Credential
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Credential
{
    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Data\Collection\IdentifiedPersons */
    protected $identifiers;

    /** @var Ubki\Data\Collection\Documents */
    protected $documents;

    /** @var Ubki\Data\Collection\Addresses */
    protected $addresses;

    /** @var string|null */
    protected $inn;

    /** @var Ubki\Data\Collection\Works|null */
    protected $works;

    /** @var Ubki\Data\Collection\Photos|null */
    protected $photos;

    /** @var Ubki\Data\Collection\LinkedPersons|null */
    protected $linkedPersons;

    public function getLanguage(): Ubki\Dictionary\Language
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

    public function getIdentifiers(): Ubki\Data\Collection\IdentifiedPersons
    {
        return $this->identifiers;
    }

    public function getDocuments(): Ubki\Data\Collection\Documents
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Data\Collection\Addresses
    {
        return $this->addresses;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getWorks(): ?Ubki\Data\Collection\Works
    {
        return $this->works;
    }

    public function getPhotos(): ?Ubki\Data\Collection\Photos
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?Ubki\Data\Collection\LinkedPersons
    {
        return $this->linkedPersons;
    }

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\Credential::PATRONYMIC => $this->getPatronymic(),
            Ubki\Data\Interfaces\Credential::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\Credential::INN => $this->getInn(),
            Ubki\Data\Interfaces\Credential::NAME => $this->getName(),
            Ubki\Data\Interfaces\Credential::BIRTH_DATE => $this->getBirthDate(),
            Ubki\Data\Interfaces\Credential::SURNAME => $this->getSurname(),
        ];
    }
}
