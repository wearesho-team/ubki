<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 */
class Entity extends Ubki\Element
{
    public const TAG = 'cki';

    /** @var string|null */
    protected $inn;

    /** @var Ubki\Data\Language */
    protected $language;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;
    
    /** @var Ubki\Data\Credential\Identifier\Collection */
    protected $identifiers;

    /** @var Ubki\Data\Work\Collection|null */
    protected $works;

    /** @var Ubki\Data\Document\Collection */
    protected $documents;

    /** @var Ubki\Data\Address\Collection */
    protected $addresses;

    /** @var array|null */
    protected $photos;

    /** @var array|null */
    protected $linkedPersons;

    public function __construct(
        Ubki\Data\Language $language,
        string $firstName,
        string $middleName,
        string $lastName,
        \DateTimeInterface $birthDate,
        Ubki\Data\Credential\Identifier\Collection $identifiers,
        Ubki\Data\Document\Collection $documents,
        Ubki\Data\Address\Collection $addresses,
        ?string $inn = null,
        ?Ubki\Data\Work\Collection $works = null,
        ?array $photos = null,
        ?array $linkedPersons = null
    ) {
        $this->language = $language;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->identifiers = $identifiers;
        $this->works = $works;
        $this->documents = $documents;
        $this->inn = $inn;
        $this->addresses = $addresses;
        $this->photos = $photos;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getLanguage(): Ubki\Data\Language
    {
        return $this->language;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getIdentifiers(): Ubki\Data\Credential\Identifier\Collection
    {
        return $this->identifiers;
    }

    public function getWorks(): ?Ubki\Data\Work\Collection
    {
        return $this->works;
    }

    public function getDocuments(): Ubki\Data\Document\Collection
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Data\Address\Collection
    {
        return $this->addresses;
    }

    public function getPhotos(): ?array
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?array
    {
        return $this->linkedPersons;
    }
}
