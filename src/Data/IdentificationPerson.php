<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Data\Element
 *
 * @method static IdentificationPerson make(...$arguments)
 */
class IdentificationPerson extends Ubki\Data\Person implements
    Ubki\Contract\Data\IdentificationPerson,
    \JsonSerializable
{
    use Makeable, Tagable;

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
        string $name = \null,
        string $inn = \null,
        string $surname = \null,
        string $patronymic = \null,
        \DateTimeInterface $birthDate = \null,
        string $organization = \null
    ) {
        $this->inn = $inn;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->birthDate = $birthDate;
        $this->organization = $organization;

        parent::__construct($name);
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'birthDate' => Carbon::make($this->birthDate),
            'organization' => $this->organization,
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
