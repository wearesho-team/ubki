<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait NaturalIdentifier
{
    use Identifier;

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
            Interfaces\Person::CREATED_AT => Carbon::instance($this->createdAt)->toDateString(),
            Interfaces\Person::LANGUAGE => $this->language->getValue(),
            Interfaces\Person::LANGUAGE_REF => $this->language->getDescription(),
            Interfaces\NaturalIdentifier::NAME => $this->name,
            Interfaces\NaturalIdentifier::PATRONYMIC => $this->patronymic,
            Interfaces\NaturalIdentifier::SURNAME => $this->surname,
            Interfaces\NaturalIdentifier::BIRTH_DATE => Carbon::instance($this->birthDate)->toDateString(),
            Interfaces\NaturalIdentifier::GENDER => $this->gender->getValue(),
            Interfaces\NaturalIdentifier::GENDER_REF => $this->gender->getDescription(),
            Interfaces\NaturalIdentifier::INN => $this->inn,
            Interfaces\NaturalIdentifier::FAMILY_STATUS => $this->familyStatus->getValue(),
            Interfaces\NaturalIdentifier::FAMILY_STATUS_REF => $this->familyStatus->getDescription(),
            Interfaces\NaturalIdentifier::EDUCATION => $this->education->getValue(),
            Interfaces\NaturalIdentifier::EDUCATION_REF => $this->education->getDescription(),
            Interfaces\NaturalIdentifier::NATIONALITY => $this->nationality->getValue(),
            Interfaces\NaturalIdentifier::NATIONALITY_REF => $this->nationality->getDescription(),
            Interfaces\NaturalIdentifier::REGISTRATION_SPD => $this->registrationSpd->getValue(),
            Interfaces\NaturalIdentifier::REGISTRATION_SPD_REF => $this->registrationSpd->getDescription(),
            Interfaces\NaturalIdentifier::SOCIAL_STATUS => $this->socialStatus->getValue(),
            Interfaces\NaturalIdentifier::SOCIAL_STATUS_REF => $this->socialStatus->getDescription(),
            Interfaces\NaturalIdentifier::CHILDREN_COUNT => $this->childrenCount,
        ];
    }

    public function tag(): string
    {
        return Interfaces\NaturalIdentifier::TAG;
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
