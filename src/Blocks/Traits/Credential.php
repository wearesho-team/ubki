<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Trait Credential
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait Credential
{
    use ElementTrait;

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

    /** @var Blocks\Collections\Identifiers */
    protected $identifiers;

    /** @var Blocks\Collections\Documents */
    protected $documents;

    /** @var Blocks\Collections\Addresses */
    protected $addresses;

    /** @var string|null */
    protected $inn;

    /** @var Blocks\Collections\Works|null */
    protected $works;

    /** @var Blocks\Collections\Photos|null */
    protected $photos;

    /** @var Blocks\Collections\LinkedPersons|null */
    protected $linkedPersons;

    public function jsonSerialize(): array
    {
        return [
            'language' => $this->language->__toString(),
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'surname' => $this->surname,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'identifiers' => array_map(function (Blocks\Interfaces\Identifier $identifier): array {
                return $identifier->jsonSerialize();
            }, $this->identifiers->jsonSerialize()),
            'documents' => array_map(function (Blocks\Interfaces\Document $document): array {
                return $document->jsonSerialize();
            }, $this->documents->jsonSerialize()),
            'addresses' => array_map(function (Blocks\Interfaces\Address $address): array {
                return $address->jsonSerialize();
            }, $this->addresses->jsonSerialize()),
            'inn' => $this->inn,
            'works' => !is_null($this->works)
                ? array_map(function (Blocks\Interfaces\Work $work): array {
                    return $work->jsonSerialize();
                }, $this->works->jsonSerialize())
                : null,
            'photos' => !is_null($this->photos)
                ? array_map(function (Blocks\Interfaces\Photo $photo): array {
                    return $photo->jsonSerialize();
                }, $this->photos->jsonSerialize())
                : null,
            'linkedPersons' => !is_null($this->linkedPersons)
                ? array_map(function (Blocks\Interfaces\LinkedPerson $person): array {
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

    public function getIdentifiers(): Blocks\Collections\Identifiers
    {
        return $this->identifiers;
    }

    public function getDocuments(): Blocks\Collections\Documents
    {
        return $this->documents;
    }

    public function getAddresses(): Blocks\Collections\Addresses
    {
        return $this->addresses;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getWorks(): ?Blocks\Collections\Works
    {
        return $this->works;
    }

    public function getPhotos(): ?Blocks\Collections\Photos
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?Blocks\Collections\LinkedPersons
    {
        return $this->linkedPersons;
    }
}
