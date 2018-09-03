<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks\Collections;

/**
 * Interface Credential
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface Credential extends ElementInterface
{
    public const TAG = 'cki';
    public const INN = 'inn';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const SURNAME = 'lname';
    public const LANGUAGE = 'reqlng';
    public const BIRTH_DATE = 'bdate';

    public function getLanguage(): References\Language;

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
