<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 *
 * @property-read string|null $inn
 * @property-read Data\Language $language
 * @property-read string $firstName
 * @property-read string $middleName
 * @property-read \DateTimeInterface $birthDate
 * @property-read Identifier\Collection|Identifier\Entity[] $identifiers
 * @property-read
 */
class Entity extends Element implements \JsonSerializable
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

    /** @var LinkedPerson\Collection|null */
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
        ?LinkedPerson\Collection $linkedPersons = null
    ) {
        parent::__construct([
            'language' => $language,
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
            'birthDate' => $birthDate,
            'identifiers' => $identifiers,
            'works' => $works,
            'documents' => $documents,
            'inn' => $inn,
            'addresses' => $addresses,
            'photos' => $photos,
            'linkedPersons' => $linkedPersons
        ]);
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

    public function getLinkedPersons(): ?LinkedPerson\Collection
    {
        return $this->linkedPersons;
    }

    public function jsonSerialize(): array
    {
        return [
            'language' => (string)$this->getLanguage(),
            'firstName' => $this->getFirstName(),
            'middleName' => $this->getMiddleName(),
            'lastName' => $this->getLastName(),
            'birthDate' => Carbon::instance($this->getBirthDate())->toDateString(),
            'identifiers' => array_map(function (Identifier\Entity $identifier): array {
                return $identifier->jsonSerialize();
            }, $this->getIdentifiers()->jsonSerialize()),
            'documents' => array_map(function (Document\Entity $document): array {
                return $document->jsonSerialize();
            }, $this->getDocuments()->jsonSerialize()),
            'addresses' => array_map(function (Address\Entity $address): array {
                return $address->jsonSerialize();
            }, $this->getAddresses()->jsonSerialize()),
            'inn' => $this->getInn(),
            'works' => !is_null($this->getWorks())
                ? array_map(function (Work\Entity $work): array {
                    return $work->jsonSerialize();
                }, $this->getWorks()->jsonSerialize())
                : null,
            'photos' => !is_null($this->getPhotos())
                ? array_map(function (Photo\Entity $photo): array {
                    return $photo->jsonSerialize();
                }, $this->getPhotos()->jsonSerialize())
                : null,
            'linkedPersons' => !is_null($this->getLinkedPersons())
                ? array_map(function (LinkedPerson\Entity $person): array {
                    return $person->jsonSerialize();
                }, $this->getLinkedPersons()->jsonSerialize())
                : null,
        ];
    }
}
