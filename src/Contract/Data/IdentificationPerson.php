<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface IdentificationPerson
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
