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

    /** @var Ubki\Dictionary\Gender */
    protected $gender;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var Ubki\Dictionary\FamilyStatus|null */
    protected $familyStatus;

    /** @var Ubki\Dictionary\Education|null */
    protected $education;

    /** @var Ubki\Dictionary\Nationality|null */
    protected $nationality;

    /** @var Ubki\Dictionary\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var Ubki\Dictionary\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

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

    public function getGender(): Ubki\Dictionary\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?Ubki\Dictionary\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): ?Ubki\Dictionary\Education
    {
        return $this->education;
    }

    public function getNationality(): ?Ubki\Dictionary\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?Ubki\Dictionary\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?Ubki\Dictionary\SocialStatus
    {
        return $this->socialStatus;
    }

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\NaturalPerson::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\NaturalPerson::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\NaturalPerson::INN => $this->getInn(),
            Ubki\Data\Interfaces\NaturalPerson::NAME => $this->getName(),
            Ubki\Data\Interfaces\NaturalPerson::PATRONYMIC => $this->getPatronymic(),
            Ubki\Data\Interfaces\NaturalPerson::SURNAME => $this->getSurname(),
            Ubki\Data\Interfaces\NaturalPerson::BIRTH_DATE => $this->getBirthDate(),
            Ubki\Data\Interfaces\NaturalPerson::GENDER => $this->getGender(),
            Ubki\Data\Interfaces\NaturalPerson::FAMILY_STATUS => $this->getFamilyStatus(),
            Ubki\Data\Interfaces\NaturalPerson::EDUCATION => $this->getEducation(),
            Ubki\Data\Interfaces\NaturalPerson::NATIONALITY => $this->getNationality(),
            Ubki\Data\Interfaces\NaturalPerson::REGISTRATION_SPD => $this->getRegistrationSpd(),
            Ubki\Data\Interfaces\NaturalPerson::SOCIAL_STATUS => $this->getSocialStatus(),
            Ubki\Data\Interfaces\NaturalPerson::CHILDREN_COUNT => $this->getChildrenCount(),
        ];
    }
}
