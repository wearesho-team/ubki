<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Interface Credential
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Credential
{
    public const TAG = 'cki';
    public const INN = 'inn';
    public const SURNAME = 'lname';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const LANGUAGE = 'reqlng';
    public const LANGUAGE_REF = 'reqlngref';
    public const BIRTH_DATE = 'bdate';

    public function getLanguage(): Dictionaries\Language;

    public function getName(): string;

    public function getPatronymic(): string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getIdentifiers(): Collections\Identifiers;

    public function getDocuments(): Collections\Documents;

    public function getAddresses(): Collections\Addresses;

    public function getInn(): ?string;

    public function getWorks(): ?Collections\Works;

    public function getPhotos(): ?Collections\Photos;

    public function getLinkedPersons(): ?Collections\LinkedPersons;
}
