<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class IdentificationPerson extends Person
{
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

    public function __construct(
        ?string $name = null,
        ?string $inn = null,
        ?string $surname = null,
        ?string $patronymic = null,
        ?string $birthDate = null,
        ?string $organization = null
    ) {
        $this->inn = $inn;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->birthDate = $birthDate;
        $this->organization = $organization;

        parent::__construct($name);
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
