<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 *
 * @property-read string|null                                        $inn
 * @property-read Data\Language                                      $language
 * @property-read string                                             $firstName
 * @property-read string                                             $middleName
 * @property-read string                                             $lastName
 * @property-read \DateTimeInterface                                 $birthDate
 * @property-read Identifier\Collection|Identifier\Entity[]          $identifiers
 * @property-read Document\Collection|Document\Entity[]              $documents
 * @property-read Address\Collection|Address\Entity[]                $addresses
 * @property-read Work\Collection|Work\Entity[]|null                 $works
 * @property-read Photo\Collection|Photo\Entity[]|null               $photos
 * @property-read LinkedPerson\Collection|LinkedPerson\Entity[]|null $linkedPersons
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'cki';

    public const INN = 'inn';
    public const LAST_NAME = 'lname';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';

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

    public function jsonSerialize(): array
    {
        return [
            'language' => (string)$this->language,
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'identifiers' => array_map(function (Identifier\Entity $identifier): array {
                return $identifier->jsonSerialize();
            }, $this->identifiers->jsonSerialize()),
            'documents' => array_map(function (Document\Entity $document): array {
                return $document->jsonSerialize();
            }, $this->documents->jsonSerialize()),
            'addresses' => array_map(function (Address\Entity $address): array {
                return $address->jsonSerialize();
            }, $this->addresses->jsonSerialize()),
            'inn' => $this->inn,
            'works' => !is_null($this->works)
                ? array_map(function (Work\Entity $work): array {
                    return $work->jsonSerialize();
                }, $this->works->jsonSerialize())
                : null,
            'photos' => !is_null($this->photos)
                ? array_map(function (Photo\Entity $photo): array {
                    return $photo->jsonSerialize();
                }, $this->photos->jsonSerialize())
                : null,
            'linkedPersons' => !is_null($this->linkedPersons)
                ? array_map(function (LinkedPerson\Entity $person): array {
                    return $person->jsonSerialize();
                }, $this->linkedPersons->jsonSerialize())
                : null,
        ];
    }
}
