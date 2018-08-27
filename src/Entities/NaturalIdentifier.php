<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier\Natural;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Identifier
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier\Natural
 *
 * @property-read string|null               $inn
 * @property-read string|null               $patronymic
 * @property-read string                    $surname
 * @property-read \DateTimeInterface        $birthDate
 * @property-read Data\Gender               $gender
 * @property-read Data\FamilyStatus|null    $familyStatus
 * @property-read Data\Education            $education
 * @property-read Data\Nationality|null     $nationality
 * @property-read Data\RegistrationSpd|null $registrationSpd
 * @property-read Data\SocialStatus|null    $socialStatus
 * @property-read int|null                  $childrenCount
 */
class NaturalIdentifier extends Data\Credential\Identifier\Identifier implements \JsonSerializable
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

    public function __construct(
        \DateTimeInterface $createdAt,
        Data\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Data\Gender $gender,
        ?string $inn = null,
        ?string $patronymic = null,
        ?Data\FamilyStatus $familyStatus = null,
        ?Data\Education $education = null,
        ?Data\Nationality $nationality = null,
        ?Data\RegistrationSpd $registrationSpd = null,
        ?Data\SocialStatus $socialStatus = null,
        ?int $childrenCount = null
    ) {
        parent::__construct($createdAt, $language, $name, [
            'surname' => $surname,
            'birthDate' => $birthDate,
            'gender' => $gender,
            'inn' => $inn,
            'patronymic' => $patronymic,
            'familyStatus' => $familyStatus,
            'education' => $education,
            'nationality' => $nationality,
            'registrationSpd' => $registrationSpd,
            'socialStatus' => $socialStatus,
            'childrenCount' => $childrenCount,
        ]);
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'surname' => $this->surname,
                'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
                'gender' => (string)$this->gender,
                'inn' => $this->inn,
                'patronymic' => $this->patronymic,
                'familyStatus' => (string)$this->familyStatus,
                'education' => (string)$this->education,
                'nationality' => (string)$this->nationality,
                'registrationSpd' => (string)$this->registrationSpd,
                'socialStatus' => (string)$this->socialStatus,
                'childrenCount' => $this->childrenCount,
            ]
        );
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getChildrenCount(): ?int
    {
        return $this->childrenCount;
    }

    public function getGender(): Data\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?Data\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): Data\Education
    {
        return $this->education;
    }

    public function getNationality(): ?Data\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?Data\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?Data\SocialStatus
    {
        return $this->socialStatus;
    }
}
