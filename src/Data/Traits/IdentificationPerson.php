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
            Interfaces\IdentificationPerson::INN => $this->getInn(),
            Interfaces\IdentificationPerson::BIRTH_DATE => $this->getBirthDate(),
            Interfaces\IdentificationPerson::SURNAME => $this->getSurname(),
            Interfaces\IdentificationPerson::PATRONYMIC => $this->getPatronymic(),
            Interfaces\IdentificationPerson::NAME => $this->getName(),
            Interfaces\IdentificationPerson::ORGANIZATION => $this->getOrganization(),
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
