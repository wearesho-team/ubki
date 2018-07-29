<?php

namespace Wearesho\Bobra\Ubki\Data\Identifier\Natural;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Identifier\Natural
 */
class Entity extends Data\Identifier\Entity
{
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

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Data\Gender */
    protected $gender;

    /** @var Data\FamilyStatus|null */
    protected $familyStatus;

    /** @var Data\Education|null */
    protected $education;

    /** @var Data\Nationality|null */
    protected $nationality;

    /** @var Data\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var Data\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function __construct(
        \DateTimeInterface $createdAt,
        Data\Language $language,
        string $name,
        string $lastName,
        \DateTimeInterface $birthDate,
        Data\Gender $gender,
        ?string $inn = null,
        ?string $middleName = null,
        ?Data\FamilyStatus $familyStatus = null,
        ?Data\Education $education = null,
        ?Data\Nationality $nationality = null,
        ?Data\RegistrationSpd $registrationSpd = null,
        ?Data\SocialStatus $socialStatus = null,
        ?int $childrenCount = null
    ) {
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->inn = $inn;
        $this->middleName = $middleName;
        $this->familyStatus = $familyStatus;
        $this->education = $education;
        $this->nationality = $nationality;
        $this->registrationSpd = $registrationSpd;
        $this->socialStatus = $socialStatus;
        $this->childrenCount = $childrenCount;

        parent::__construct($createdAt, $language, $name);
    }

    public function tag(): string
    {
        return 'ident';
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getChildrenCount(): ?int
    {
        return $this->childrenCount;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function getGender(): Data\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?Data\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): ?Data\Education
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
