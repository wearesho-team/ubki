<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

/**
 * Trait IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait IdentificationPerson
{
    use Person;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $surname;

    /** @var string|null */
    protected $patronymic;

    /** @var string|null */
    protected $birthDate;

    /** @var string|null */
    protected $organization;

    public function jsonSerialize(): array
    {
        return [
            IdentificationPerson::INN => $this->inn,
            IdentificationPerson::BIRTH_DATE => $this->birthDate,
            IdentificationPerson::SURNAME => $this->surname,
            IdentificationPerson::PATRONYMIC => $this->patronymic,
            IdentificationPerson::NAME => $this->name,
            IdentificationPerson::ORGANIZATION => $this->organization
        ];
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
