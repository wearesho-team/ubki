<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Blocks\Collections;
use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Credential extends Element implements \JsonSerializable
{
    public const TAG = 'cki';
    public const INN = 'inn';
    public const LAST_NAME = 'lname';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';

    /** @var References\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Collections\Identifiers */
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

    public function __construct(
        References\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Collections\Identifiers $identifiers,
        Collections\Documents $documents,
        Collections\Addresses $addresses,
        ?string $inn = null,
        ?Collections\Works $works = null,
        ?Collections\Photos $photos = null,
        ?Collections\LinkedPersons $linkedPersons = null
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

    public function jsonSerialize(): array
    {
        return [
            'language' => (string)$this->language,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'surname' => $this->surname,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'identifiers' => array_map(function (Identifier $identifier): array {
                return $identifier->jsonSerialize();
            }, $this->identifiers->jsonSerialize()),
            'documents' => array_map(function (Document $document): array {
                return $document->jsonSerialize();
            }, $this->documents->jsonSerialize()),
            'addresses' => array_map(function (Address $address): array {
                return $address->jsonSerialize();
            }, $this->addresses->jsonSerialize()),
            'inn' => $this->inn,
            'works' => !is_null($this->works)
                ? array_map(function (Work $work): array {
                    return $work->jsonSerialize();
                }, $this->works->jsonSerialize())
                : null,
            'photos' => !is_null($this->photos)
                ? array_map(function (Photo $photo): array {
                    return $photo->jsonSerialize();
                }, $this->photos->jsonSerialize())
                : null,
            'linkedPersons' => !is_null($this->linkedPersons)
                ? array_map(function (LinkedPerson $person): array {
                    return $person->jsonSerialize();
                }, $this->linkedPersons->jsonSerialize())
                : null,
        ];
    }

    public function getLanguage(): References\Language
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

    public function getIdentifiers(): Collections\Identifiers
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
