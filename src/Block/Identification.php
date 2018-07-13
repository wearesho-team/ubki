<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Identification
 * Identification data of subject
 * <ident> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Identification
{
    public const TAG = 'ident';

    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const INN = 'inn';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
    public const LAST_NAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const GENDER = 'csex';
    public const FAMILY_STATUS = 'family';
    public const EDUCATION = 'ceduc';
    public const NATIONALITY = 'cgrag';
    public const SPD_REGISTRATION = 'spd';
    public const SOCIAL_STATUS = 'sstate';
    public const CHILDREN_COUNT = 'cchild';

    /**
     * Created date of this data
     * vdate attribute (required)
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Language of block
     * lng attribute (required)
     * @var int
     */
    protected $language;

    /**
     * Inn of subject
     * inn attribute (not required)
     * @var int
     */
    protected $inn;

    /**
     * First name of subject
     * fname attribute (required)
     * @var string
     */
    protected $firstName;

    /**
     * Middle name of subject
     * mname attribute (not required)
     * @var string
     */
    protected $middleName;

    /**
     * Last name of Subject
     * lname attribute (required)
     * @var string
     */
    protected $lastName;

    /**
     * Birth date of subject
     * bdate attribute (required)
     * @var \DateTimeInterface
     */
    protected $birthDate;

    /**
     * Gender of subject
     * csex attribute (required)
     * @var int
     */
    protected $gender;

    /**
     * Family status of subject
     * family attribute (not required)
     * @var int
     */
    protected $familyStatus;

    /**
     * Education status of subject
     * ceduc attribute (not required)
     * @var int
     */
    protected $education;

    /**
     * Nationality of subject
     * cgrag attribute (not required)
     * @var int
     */
    protected $nationality;

    /**
     * SPD registration of subject
     * spd attribute (not required)
     * @var int
     */
    protected $spdRegistration;

    /**
     * Social status of subject
     * sstate attribute (not required)
     * @var int
     */
    protected $socialStatus;

    /**
     * Count of subject's children
     * cchild attribute (not required)
     * @var int
     */
    protected $childrenCount;

    /**
     * Identification constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param int                $language
     * @param string             $firstName
     * @param string             $lastName
     * @param \DateTimeInterface $birthDate
     * @param int                $gender
     * @param int|null           $inn
     * @param string|null        $middleName
     * @param int|null           $familyStatus
     * @param int|null           $education
     * @param int|null           $nationality
     * @param int|null           $spdRegistration
     * @param int|null           $socialStatus
     * @param int|null           $childrenCount
     */
    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        string $firstName,
        string $lastName,
        \DateTimeInterface $birthDate,
        int $gender,
        int $inn = null,
        string $middleName = null,
        int $familyStatus = null,
        int $education = null,
        int $nationality = null,
        int $spdRegistration = null,
        int $socialStatus = null,
        int $childrenCount = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->inn = $inn;
        $this->middleName = $middleName;
        $this->familyStatus = $familyStatus;
        $this->education = $education;
        $this->nationality = $nationality;
        $this->spdRegistration = $spdRegistration;
        $this->socialStatus = $socialStatus;
        $this->childrenCount = $childrenCount;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function getFamilyStatus(): int
    {
        return $this->familyStatus;
    }

    public function getEducation(): int
    {
        return $this->education;
    }

    public function getNationality(): int
    {
        return $this->nationality;
    }

    public function getSpdRegistration(): int
    {
        return $this->spdRegistration;
    }

    public function getSocialStatus(): int
    {
        return $this->socialStatus;
    }

    public function getChildrenCount(): int
    {
        return $this->childrenCount;
    }
}
