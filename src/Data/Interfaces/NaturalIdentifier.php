<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Interface NaturalInterface
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface NaturalIdentifier extends Identifier
{
    public const TAG = 'ident';
    public const INN = 'inn';
    public const NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
    public const LAST_NAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const GENDER = 'csex';
    public const FAMILY_STATUS = 'family';
    public const EDUCATION = 'ceduc';
    public const NATIONALITY = 'cgrag';
    public const REGISTRATION_SPD = 'spd';
    public const SOCIAL_STATUS = 'sstate';
    public const CHILDREN_COUNT = 'cchild';

    public function getInn(): ?string;

    public function getPatronymic(): ?string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getChildrenCount(): ?int;

    public function getGender(): Dictionaries\Gender;

    public function getFamilyStatus(): ?Dictionaries\FamilyStatus;

    public function getEducation(): Dictionaries\Education;

    public function getNationality(): ?Dictionaries\Nationality;

    public function getRegistrationSpd(): ?Dictionaries\RegistrationSpd;

    public function getSocialStatus(): ?Dictionaries\SocialStatus;
}
