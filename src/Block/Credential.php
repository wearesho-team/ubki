<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Block
 */
class Credential extends Ubki\BaseBlock
{
    /** @var int|null */
    protected $inn;

    /** @var string */
    protected $lastName;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $middleName;

    /** @var int */
    protected $language;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Collection\Identification */
    protected $identifications;

    /** @var Ubki\Collection\LegalIdentification|null */
    protected $legalIdentifications;

    /** @var Ubki\Collection\Work|null */
    protected $works;

    /** @var Ubki\Collection\Document */
    protected $documents;

    /** @var Ubki\Collection\Address */
    protected $addresses;

    /** @var Ubki\Collection\Photo|null */
    protected $photos;

    public function __construct(
        string $firstName,
        string $middleName,
        string $lastName,
        \DateTimeInterface $birthDate,
        int $language,
        Ubki\Collection\Identification $identifications,
        Ubki\Collection\Document $documents,
        Ubki\Collection\Address $addresses,
        ?int $inn = null,
        ?Ubki\Collection\Work $works = null,
        ?Ubki\Collection\Photo $photos = null,
        ?Ubki\Collection\LegalIdentification $legalIdentifications = null
    ) {
        $this->inn = $inn;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->language = $language;
        $this->birthDate = $birthDate;
        $this->identifications = $identifications;
        $this->works = $works;
        $this->documents = $documents;
        $this->addresses = $addresses;
        $this->photos = $photos;
        $this->legalIdentifications = $legalIdentifications;
    }

    public function tag(): string
    {
        return 'cki';
    }

    public function getInn(): ?int
    {
        return $this->inn;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getIdentifications(): Ubki\Collection\Identification
    {
        return $this->identifications;
    }

    public function getWorks(): ?Ubki\Collection\Work
    {
        return $this->works;
    }

    public function getDocuments(): Ubki\Collection\Document
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Collection\Address
    {
        return $this->addresses;
    }

    public function getPhotos(): ?Ubki\Collection\Photo
    {
        return $this->photos;
    }

    public function getLegalIdentifications(): ?Ubki\Collection\LegalIdentification
    {
        return $this->legalIdentifications;
    }
}
