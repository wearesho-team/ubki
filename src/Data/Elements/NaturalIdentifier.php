<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class NaturalIdentifier
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class NaturalIdentifier extends Identifier implements Data\Interfaces\NaturalIdentifier
{
    use Data\Traits\NaturalIdentifier;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        References\Gender $gender,
        ?string $inn = null,
        ?string $patronymic = null,
        ?References\FamilyStatus $familyStatus = null,
        ?References\Education $education = null,
        ?References\Nationality $nationality = null,
        ?References\RegistrationSpd $registrationSpd = null,
        ?References\SocialStatus $socialStatus = null,
        ?int $childrenCount = null
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
