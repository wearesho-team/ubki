<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data
 */
class NaturalPerson extends IdentifiedPerson
{
    public const INN = 'inn';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const SURNAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const GENDER = 'csex';
    public const GENDER_REF = 'csexref';
    public const FAMILY_STATUS = 'family';
    public const FAMILY_STATUS_REF = 'familyref';
    public const EDUCATION = 'ceduc';
    public const EDUCATION_REF = 'ceducref';
    public const NATIONALITY = 'cgrag';
    public const NATIONALITY_REF = 'cgragref';
    public const REGISTRATION_SPD = 'spd';
    public const REGISTRATION_SPD_REF = 'spdref';
    public const SOCIAL_STATUS = 'sstate';
    public const SOCIAL_STATUS_REF = 'sstateref';
    public const CHILDREN_COUNT = 'cchild';

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

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Dictionary\Gender $gender,
        string $inn = null,
        string $patronymic = null,
        Ubki\Dictionary\FamilyStatus $familyStatus = null,
        Ubki\Dictionary\Education $education = null,
        Ubki\Dictionary\Nationality $nationality = null,
        Ubki\Dictionary\RegistrationSpd $registrationSpd = null,
        Ubki\Dictionary\SocialStatus $socialStatus = null,
        int $childrenCount = null
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
            NaturalPerson::CREATED_AT => $this->getCreatedAt(),
            NaturalPerson::LANGUAGE => $this->getLanguage(),
            NaturalPerson::INN => $this->getInn(),
            NaturalPerson::NAME => $this->getName(),
            NaturalPerson::PATRONYMIC => $this->getPatronymic(),
            NaturalPerson::SURNAME => $this->getSurname(),
            NaturalPerson::BIRTH_DATE => $this->getBirthDate(),
            NaturalPerson::GENDER => $this->getGender(),
            NaturalPerson::FAMILY_STATUS => $this->getFamilyStatus(),
            NaturalPerson::EDUCATION => $this->getEducation(),
            NaturalPerson::NATIONALITY => $this->getNationality(),
            NaturalPerson::REGISTRATION_SPD => $this->getRegistrationSpd(),
            NaturalPerson::SOCIAL_STATUS => $this->getSocialStatus(),
            NaturalPerson::CHILDREN_COUNT => $this->getChildrenCount(),
        ];
    }
}
