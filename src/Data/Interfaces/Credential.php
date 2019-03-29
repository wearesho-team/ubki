<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Credential
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Credential extends Ubki\ElementInterface
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

    public function getIdentifiers(): Ubki\Data\Collection\IdentifiedPersons;

    public function getDocuments(): Ubki\Data\Collection\Documents;

    public function getAddresses(): Ubki\Data\Collection\Addresses;

    public function getInn(): ?string;

    public function getWorks(): ?Ubki\Data\Collection\Works;

    public function getPhotos(): ?Ubki\Data\Collection\Photos;

    public function getLinkedPersons(): ?Ubki\Data\Collection\LinkedPersons;
}
