<?php

namespace Wearesho\Bobra\Ubki\Data\Identifier\Natural;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Identifier\Natural
 */
class Entity extends Data\Identifier\Entity
{
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

    /** @var int|null */
    protected $familyStatus;

    /** @var int|null */
    protected $education;

    /** @var int|null */
    protected $nationality;

    /** @var int|null */
    protected $registrationSpd;

    /** @var int|null */
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
        ?int $familyStatus = null,
        ?int $education = null,
        ?int $nationality = null,
        ?int $registrationSpd = null,
        ?int $socialStatus = null,
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

    public function getRegistrationSpd(): ?int
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?int
    {
        return $this->socialStatus;
    }
}
