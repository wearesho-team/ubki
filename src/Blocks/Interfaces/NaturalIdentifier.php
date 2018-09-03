<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\References;

/**
 * Interface NaturalInterface
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
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

    public function getGender(): References\Gender;

    public function getFamilyStatus(): ?References\FamilyStatus;

    public function getEducation(): References\Education;

    public function getNationality(): ?References\Nationality;

    public function getRegistrationSpd(): ?References\RegistrationSpd;

    public function getSocialStatus(): ?References\SocialStatus;
}
