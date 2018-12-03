<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

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

    /** @var Ubki\Dictionaries\Gender */
    protected $gender;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var Ubki\Dictionaries\FamilyStatus|null */
    protected $familyStatus;

    /** @var Ubki\Dictionaries\Education|null */
    protected $education;

    /** @var Ubki\Dictionaries\Nationality|null */
    protected $nationality;

    /** @var Ubki\Dictionaries\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var Ubki\Dictionaries\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\IdentifiedPerson::CREATED_AT => $this->createdAt,
            Ubki\Data\Interfaces\IdentifiedPerson::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\NaturalPerson::NAME => $this->name,
            Ubki\Data\Interfaces\NaturalPerson::PATRONYMIC => $this->patronymic,
            Ubki\Data\Interfaces\NaturalPerson::SURNAME => $this->surname,
            Ubki\Data\Interfaces\NaturalPerson::BIRTH_DATE => $this->birthDate,
            Ubki\Data\Interfaces\NaturalPerson::GENDER => $this->gender,
            Ubki\Data\Interfaces\NaturalPerson::INN => $this->inn,
            Ubki\Data\Interfaces\NaturalPerson::FAMILY_STATUS => $this->familyStatus,
            Ubki\Data\Interfaces\NaturalPerson::EDUCATION => $this->education,
            Ubki\Data\Interfaces\NaturalPerson::NATIONALITY => $this->nationality,
            Ubki\Data\Interfaces\NaturalPerson::REGISTRATION_SPD => $this->registrationSpd,
            Ubki\Data\Interfaces\NaturalPerson::SOCIAL_STATUS => $this->socialStatus,
            Ubki\Data\Interfaces\NaturalPerson::CHILDREN_COUNT => $this->childrenCount,
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\NaturalPerson::TAG;
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

    public function getGender(): Ubki\Dictionaries\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?Ubki\Dictionaries\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): Ubki\Dictionaries\Education
    {
        return $this->education;
    }

    public function getNationality(): ?Ubki\Dictionaries\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?Ubki\Dictionaries\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?Ubki\Dictionaries\SocialStatus
    {
        return $this->socialStatus;
    }
}
