<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\References;

/**
 * Class NaturalIdentifier
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class NaturalIdentifier extends Identifier implements \JsonSerializable
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

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var References\Gender */
    protected $gender;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var References\FamilyStatus|null */
    protected $familyStatus;

    /** @var References\Education|null */
    protected $education;

    /** @var References\Nationality|null */
    protected $nationality;

    /** @var References\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var References\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        References\Gender $gender,
        ?string $inn = null,
        ?string $patronymic = null,
        ?References\FamilyStatus $familyStatus = null,
        ?References\Education $education = null,
        ?References\Nationality $nationality = null,
        ?References\RegistrationSpd $registrationSpd = null,
        ?References\SocialStatus $socialStatus = null,
        ?int $childrenCount = null
    ) {
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->inn = $inn;
        $this->patronymic = $patronymic;
        $this->familyStatus = $familyStatus;
        $this->education = $education;
        $this->nationality = $nationality;
        $this->registrationSpd = $registrationSpd;
        $this->socialStatus = $socialStatus;
        $this->childrenCount = $childrenCount;

        parent::__construct($createdAt, $language, $name);
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
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
        ]);
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

    public function getGender(): References\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?References\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): References\Education
    {
        return $this->education;
    }

    public function getNationality(): ?References\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?References\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?References\SocialStatus
    {
        return $this->socialStatus;
    }
}
