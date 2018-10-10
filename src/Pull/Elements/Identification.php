<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
class Identification implements ElementInterface
{
    use ElementTrait;

    public const TAG = 'ident';
    public const INN = 'okpo';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const SURNAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    
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

    public function __construct(
        string $inn,
        string $name = null,
        string $patronymic = null,
        string $surname = null,
        \DateTimeInterface $birthDate = null
    ) {
        $this->inn = $inn;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
    }

    public function jsonSerialize(): array
    {
        return [
            static::INN => $this->inn,
            static::NAME => $this->name,
            static::PATRONYMIC => $this->patronymic,
            static::SURNAME => $this->surname,
            static::BIRTH_DATE => Carbon::instance($this->birthDate)->toDateString(),
        ];
    }

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
}
