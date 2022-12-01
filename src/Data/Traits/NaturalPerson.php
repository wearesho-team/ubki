<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait NaturalPerson
{
    use IdentifiedPerson;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Dictionaries\Gender */
    protected $gender;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var Dictionaries\FamilyStatus|null */
    protected $familyStatus;

    /** @var Dictionaries\Education|null */
    protected $education;

    /** @var Dictionaries\Nationality|null */
    protected $nationality;

    /** @var Dictionaries\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var Dictionaries\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\IdentifiedPerson::CREATED_AT => $this->createdAt,
            Interfaces\IdentifiedPerson::LANGUAGE => $this->language,
            Interfaces\NaturalPerson::NAME => $this->name,
            Interfaces\NaturalPerson::PATRONYMIC => $this->patronymic,
            Interfaces\NaturalPerson::SURNAME => $this->surname,
            Interfaces\NaturalPerson::BIRTH_DATE => $this->birthDate,
            Interfaces\NaturalPerson::GENDER => $this->gender,
            Interfaces\NaturalPerson::INN => $this->inn,
            Interfaces\NaturalPerson::FAMILY_STATUS => $this->familyStatus,
            Interfaces\NaturalPerson::EDUCATION => $this->education,
            Interfaces\NaturalPerson::NATIONALITY => $this->nationality,
            Interfaces\NaturalPerson::REGISTRATION_SPD => $this->registrationSpd,
            Interfaces\NaturalPerson::SOCIAL_STATUS => $this->socialStatus,
            Interfaces\NaturalPerson::CHILDREN_COUNT => $this->childrenCount,
        ];
    }

    public function tag(): string
    {
        return Interfaces\NaturalPerson::TAG;
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

    public function getGender(): Dictionaries\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?Dictionaries\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): Dictionaries\Education
    {
        return $this->education;
    }

    public function getNationality(): ?Dictionaries\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?Dictionaries\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?Dictionaries\SocialStatus
    {
        return $this->socialStatus;
    }
}
