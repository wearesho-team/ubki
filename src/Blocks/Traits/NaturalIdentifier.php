<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References;

/**
 * Trait NaturalIdentifier
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait NaturalIdentifier
{
    use Identifier;
    use ElementTrait;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var References\Gender */
    protected $gender;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var References\FamilyStatus|null */
    protected $familyStatus;

    /** @var References\Education|null */
    protected $education;

    /** @var References\Nationality|null */
    protected $nationality;

    /** @var References\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var References\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'surname' => $this->surname,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'gender' => $this->gender->__toString(),
            'inn' => $this->inn,
            'patronymic' => $this->patronymic,
            'familyStatus' => $this->familyStatus->__toString(),
            'education' => $this->education->__toString(),
            'nationality' => $this->nationality->__toString(),
            'registrationSpd' => $this->registrationSpd->__toString(),
            'socialStatus' => $this->socialStatus->__toString(),
            'childrenCount' => $this->childrenCount,
        ]);
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

    public function getGender(): References\Gender
    {
        return $this->gender;
    }

    public function getFamilyStatus(): ?References\FamilyStatus
    {
        return $this->familyStatus;
    }

    public function getEducation(): References\Education
    {
        return $this->education;
    }

    public function getNationality(): ?References\Nationality
    {
        return $this->nationality;
    }

    public function getRegistrationSpd(): ?References\RegistrationSpd
    {
        return $this->registrationSpd;
    }

    public function getSocialStatus(): ?References\SocialStatus
    {
        return $this->socialStatus;
    }
}
