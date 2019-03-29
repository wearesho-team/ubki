<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class NaturalPerson extends IdentifiedPerson implements Ubki\Data\Interfaces\NaturalPerson
{
    use Ubki\Data\Traits\NaturalPerson;

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
}
