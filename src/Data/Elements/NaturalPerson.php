<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class NaturalPerson extends IdentifiedPerson implements Ubki\Data\Interfaces\NaturalPerson
{
    use Ubki\Data\Traits\NaturalPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionaries\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Dictionaries\Gender $gender,
        string $inn = null,
        string $patronymic = null,
        Ubki\Dictionaries\FamilyStatus $familyStatus = null,
        Ubki\Dictionaries\Education $education = null,
        Ubki\Dictionaries\Nationality $nationality = null,
        Ubki\Dictionaries\RegistrationSpd $registrationSpd = null,
        Ubki\Dictionaries\SocialStatus $socialStatus = null,
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
