<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class IdentificationPerson extends Data\Person
{
    public const NAME = 'fname';
    public const INN = 'okpo';
    public const SURNAME = 'lname';
    public const PATRONYMIC = 'mname';
    public const BIRTH_DATE = 'bdate';
    public const ORGANIZATION = 'orgname';

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

    public function __construct(
        string $name = null,
        string $inn = null,
        string $surname = null,
        string $patronymic = null,
        \DateTimeInterface $birthDate = null,
        string $organization = null
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }
}
