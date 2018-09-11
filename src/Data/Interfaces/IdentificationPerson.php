<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Interface IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface IdentificationPerson extends Person
{
    public const NAME = 'fname';
    public const INN = 'okpo';
    public const SURNAME = 'lname';
    public const PATRONYMIC = 'mname';
    public const BIRTH_DATE = 'bdate';
    public const ORGANIZATION = 'orgname';

    public function getInn(): ?string;

    public function getSurname(): ?string;

    public function getPatronymic(): ?string;

    public function getBirthDate(): ?\DateTimeInterface;

    public function getOrganization(): ?string;
}
