<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;

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

    /** @var \DateTimeInterface|null */
    protected $birthDate;

    /** @var string|null */
    protected $organization;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\IdentificationPerson::INN => $this->inn,
            Interfaces\IdentificationPerson::BIRTH_DATE => $this->birthDate,
            Interfaces\IdentificationPerson::SURNAME => $this->surname,
            Interfaces\IdentificationPerson::PATRONYMIC => $this->patronymic,
            Interfaces\IdentificationPerson::NAME => $this->name,
            Interfaces\IdentificationPerson::ORGANIZATION => $this->organization
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
