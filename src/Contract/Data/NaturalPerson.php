<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface NaturalPerson
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface NaturalPerson
{
    public const INN = 'inn';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const SURNAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const GENDER = 'csex';
    public const GENDER_REF = 'csexref';
    public const FAMILY_STATUS = 'family';
    public const FAMILY_STATUS_REF = 'familyref';
    public const EDUCATION = 'ceduc';
    public const EDUCATION_REF = 'ceducref';
    public const NATIONALITY = 'cgrag';
    public const NATIONALITY_REF = 'cgragref';
    public const REGISTRATION_SPD = 'spd';
    public const REGISTRATION_SPD_REF = 'spdref';
    public const SOCIAL_STATUS = 'sstate';
    public const SOCIAL_STATUS_REF = 'sstateref';
    public const CHILDREN_COUNT = 'cchild';

    public function getInn(): ?string;

    public function getPatronymic(): ?string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getChildrenCount(): ?int;

    public function getGender(): Ubki\Dictionary\Gender;

    public function getFamilyStatus(): ?Ubki\Dictionary\FamilyStatus;

    public function getEducation(): ?Ubki\Dictionary\Education;

    public function getNationality(): ?Ubki\Dictionary\Nationality;

    public function getRegistrationSpd(): ?Ubki\Dictionary\RegistrationSpd;

    public function getSocialStatus(): ?Ubki\Dictionary\SocialStatus;
}
