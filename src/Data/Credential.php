<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Credential make(...$arguments)
 */
class Credential implements Ubki\Contract\Data\Credential, \JsonSerializable
{
    use Makeable, Tagable;

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

    /** @var Ubki\Data\Collection\IdentifiedPerson */
    protected $identifiers;

    /** @var Ubki\Data\Collection\Document */
    protected $documents;

    /** @var Ubki\Data\Collection\Address */
    protected $addresses;

    /** @var string */
    protected $inn;

    /** @var Ubki\Data\Collection\Work|null */
    protected $works;

    /** @var Ubki\Data\Collection\Photo|null */
    protected $photos;

    /** @var Ubki\Data\Collection\LinkedPerson|null */
    protected $linkedPersons;

    public function __construct(
        Ubki\Dictionary\Language $language,
        string $name,
        string $patronymic,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Data\Collection\IdentifiedPerson $identifiers,
        Ubki\Data\Collection\Document $documents,
        Ubki\Data\Collection\Address $addresses,
        string $inn,
        Ubki\Data\Collection\Work $works = \null,
        Ubki\Data\Collection\Photo $photos = \null,
        Ubki\Data\Collection\LinkedPerson $linkedPersons = \null
    ) {
        Ubki\Validator::OKPO()->validate($inn);
        Ubki\Validator::NAME()->validate($name);
        Ubki\Validator::NAME()->validate($patronymic);
        Ubki\Validator::NAME()->validate($surname);

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
            'language' => $this->language,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'surname' => $this->surname,
            'birthDate' => Carbon::make($this->birthDate),
            'identifiers' => $this->identifiers,
            'documents' => $this->documents,
            'addresses' => $this->addresses,
            'inn' => $this->inn,
            'works' => $this->works,
            'photos' => $this->photos,
            'linkedPersons' => $this->linkedPersons,
        ];
    }

    public static function tag(): string
    {
        return 'cki';
    }

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

    public function getIdentifiers(): Ubki\Data\Collection\IdentifiedPerson
    {
        return $this->identifiers;
    }

    public function getDocuments(): Ubki\Data\Collection\Document
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Data\Collection\Address
    {
        return $this->addresses;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getWorks(): ?Ubki\Data\Collection\Work
    {
        return $this->works;
    }

    public function getPhotos(): ?Ubki\Data\Collection\Photo
    {
        return $this->photos;
    }

    public function getLinkedPersons(): ?Ubki\Data\Collection\LinkedPerson
    {
        return $this->linkedPersons;
    }
}
