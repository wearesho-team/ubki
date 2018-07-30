<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 */
class Entity extends Element
{
    public const TAG = 'cki';
    
    public const INN = 'inn';
    public const LAST_NAME = 'lname';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
    
    /** @var string|null */
    protected $inn;

    /** @var Data\Language */
    protected $language;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;
    
    /** @var Identifier\Collection */
    protected $identifiers;

    /** @var Work\Collection|null */
    protected $works;

    /** @var Document\Collection */
    protected $documents;

    /** @var Address\Collection */
    protected $addresses;

    /** @var Photo\Collection|null */
    protected $photos;

    /** @var array|null */
    protected $linkedPersons;

    public function __construct(
        Data\Language $language,
        string $firstName,
        string $middleName,
        string $lastName,
        \DateTimeInterface $birthDate,
        Identifier\Collection $identifiers,
        Document\Collection $documents,
        Address\Collection $addresses,
        ?string $inn = null,
        ?Work\Collection $works = null,
        ?Photo\Collection $photos = null,
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

    public function getLanguage(): Data\Language
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

    public function getIdentifiers(): Identifier\Collection
    {
        return $this->identifiers;
    }

    public function getWorks(): ?Work\Collection
    {
        return $this->works;
    }

    public function getDocuments(): Document\Collection
    {
        return $this->documents;
    }

    public function getAddresses(): Address\Collection
    {
        return $this->addresses;
    }

    public function getPhotos(): ?Photo\Collection
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?array
    {
        return $this->linkedPersons;
    }
}
