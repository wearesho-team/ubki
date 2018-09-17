<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Validation\Rule;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\Number;
use Wearesho\Bobra\Ubki\Validation\Rules\PersonName;

/**
 * Class NaturalPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class NaturalPerson extends IdentifiedPerson implements Data\Interfaces\NaturalPerson
{
    use Data\Traits\NaturalPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Dictionaries\Gender $gender,
        string $inn = null,
        string $patronymic = null,
        Dictionaries\FamilyStatus $familyStatus = null,
        Dictionaries\Education $education = null,
        Dictionaries\Nationality $nationality = null,
        Dictionaries\RegistrationSpd $registrationSpd = null,
        Dictionaries\SocialStatus $socialStatus = null,
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

    public function rules(): ?RuleCollection
    {
        $rules = new RuleCollection([
            Number::check(['inn',])->length(Rule::INN_LENGTH),
            PersonName::check(['patronymic', 'surname',])
        ]);

        return $rules->merge(parent::rules());
    }
}
