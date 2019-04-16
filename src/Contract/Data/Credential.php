<?php

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface Credential
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Credential
{
    public const INN = 'inn';
    public const SURNAME = 'lname';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const LANGUAGE = 'reqlng';
    public const LANGUAGE_REF = 'reqlngref';
    public const BIRTH_DATE = 'bdate';

    public function getLanguage(): Ubki\Dictionary\Language;

    public function getName(): string;

    public function getPatronymic(): string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getIdentifiers(): Ubki\Data\Collection\IdentifiedPerson;

    public function getDocuments(): Ubki\Data\Collection\Document;

    public function getAddresses(): Ubki\Data\Collection\Address;

    public function getInn(): string;

    public function getWorks(): ?Ubki\Data\Collection\Work;

    public function getPhotos(): ?Ubki\Data\Collection\Photo;

    public function getLinkedPersons(): ?Ubki\Data\Collection\LinkedPerson;
}
