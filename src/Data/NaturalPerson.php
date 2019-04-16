<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data
 */
class NaturalPerson extends IdentifiedPerson implements Ubki\Contract\Data\NaturalPerson
{
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
        string $inn = \null,
        string $patronymic = \null,
        Ubki\Dictionary\FamilyStatus $familyStatus = \null,
        Ubki\Dictionary\Education $education = \null,
        Ubki\Dictionary\Nationality $nationality = \null,
        Ubki\Dictionary\RegistrationSpd $registrationSpd = \null,
        Ubki\Dictionary\SocialStatus $socialStatus = \null,
        int $childrenCount = \null
    ) {
        Ubki\Validator::INN()->validate($inn, \true);
        Ubki\Validator::NAME()->validate($patronymic, \true);
        Ubki\Validator::NAME()->validate($name);
        Ubki\Validator::NAME()->validate($surname);

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
}
