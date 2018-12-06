<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class RatingScore
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RatingScore extends Element
{
    public const TAG = 'urating';
    public const INN = 'inn';
    public const NAME = 'fname';
    public const SURNAME = 'lname';
    public const PATRONYMIC = 'mname';
    public const BIRTH_DATE = 'bdate';
    public const SCORE = 'score';
    public const PREVIOUS_SCORE = 'scorelast';
    public const DATE = 'scoredate';
    public const PREVIOUS_DATE = 'scoredatelast';
    public const LEVEL = 'scorelevel';
    public const CURRENT = 'current';
    public const PREVIOUS = 'previous';
    public const VALUE = 'value';

    /** @var string */
    protected $inn;

    /** @var string */
    protected $surname;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var Carbon */
    protected $birthDate;

    /** @var string */
    protected $score;

    /** @var string */
    protected $previousScore;

    /** @var Carbon */
    protected $date;

    /** @var string */
    protected $level;

    public function __construct(
        string $inn,
        string $surname,
        string $name,
        string $patronymic,
        Carbon $birthDate,
        string $score,
        string $previousScore,
        Carbon $date,
        string $level
    ) {
        $this->inn = $inn;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->birthDate = $birthDate;
        $this->score = $score;
        $this->previousScore = $previousScore;
        $this->date = $date;
        $this->level = $level;
    }

    public function jsonSerialize(): array
    {
        return [
            static::INN => $this->getInn(),
            static::SURNAME => $this->getSurname(),
            static::NAME => $this->getName(),
            static::PATRONYMIC => $this->getPatronymic(),
            static::BIRTH_DATE => $this->getBirthDate(),
            static::SCORE => $this->getScore(),
            static::PREVIOUS_SCORE => $this->getPreviousScore(),
            static::DATE => $this->getDate(),
            static::LEVEL => $this->getLevel(),
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getBirthDate(): Carbon
    {
        return $this->birthDate;
    }

    public function getScore(): string
    {
        return $this->score;
    }

    public function getPreviousScore(): string
    {
        return $this->previousScore;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
