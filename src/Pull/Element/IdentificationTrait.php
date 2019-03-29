<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

/**
 * Trait IdentificationTrait
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
trait IdentificationTrait
{
    /** @var string */
    protected $inn;

    /** @var string|null */
    protected $name;

    /** @var string|null */
    protected $patronymic;

    /** @var string|null */
    protected $surname;

    /** @var \DateTimeInterface|null */
    protected $birthDate;

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function associativeAttributes(): array
    {
        return [
            IdentificationInterface::INN => $this->getInn(),
            IdentificationInterface::NAME => $this->getName(),
            IdentificationInterface::PATRONYMIC => $this->getPatronymic(),
            IdentificationInterface::SURNAME => $this->getSurname(),
            IdentificationInterface::BIRTH_DATE => $this->getBirthDate(),
        ];
    }
}
