<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class Identification
 * Identification data of subject
 * @package Wearesho\Bobra\Ubki\Block
 */
class Identification extends BaseBlock
{
    // attributes
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

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var int */
    protected $language;

    /** @var int|null */
    protected $inn;

    /** @var string */
    protected $firstName;

    /** @var null|string */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var int */
    protected $gender;

    /** @var int|null */
    protected $familyStatus;

    /** @var int|null */
    protected $education;

    /** @var int|null */
    protected $nationality;

    /** @var int|null */
    protected $spdRegistration;

    /** @var int|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        string $firstName,
        string $lastName,
        \DateTimeInterface $birthDate,
        int $gender,
        ?int $inn = null,
        ?string $middleName = null,
        ?int $familyStatus = null,
        ?int $education = null,
        ?int $nationality = null,
        ?int $spdRegistration = null,
        ?int $socialStatus = null,
        ?int $childrenCount = null
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

    public function tag(): string
    {
        return 'ident';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getInn(): ?int
    {
        return $this->inn;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): ?string
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

    public function getFamilyStatus(): ?int
    {
        return $this->familyStatus;
    }

    public function getEducation(): ?int
    {
        return $this->education;
    }

    public function getNationality(): ?int
    {
        return $this->nationality;
    }

    public function getSpdRegistration(): ?int
    {
        return $this->spdRegistration;
    }

    public function getSocialStatus(): ?int
    {
        return $this->socialStatus;
    }

    public function getChildrenCount(): ?int
    {
        return $this->childrenCount;
    }
}
