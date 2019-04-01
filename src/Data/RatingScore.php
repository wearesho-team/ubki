<?php

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Class RatingScore
 * @package Wearesho\Bobra\Ubki\Data
 */
class RatingScore
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

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var string */
    protected $score;

    /** @var string */
    protected $previousScore;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var string */
    protected $level;

    public function __construct(
        string $inn,
        string $surname,
        string $name,
        string $patronymic,
        \DateTimeInterface $birthDate,
        string $score,
        string $previousScore,
        \DateTimeInterface $date,
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

    public function getBirthDate(): \DateTimeInterface
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

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
