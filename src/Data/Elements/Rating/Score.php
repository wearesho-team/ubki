<?php

namespace Wearesho\Bobra\Ubki\Data\Elements\Rating;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Score
 * @package Wearesho\Bobra\Ubki\Data\Elements\Rating
 */
class Score implements Element
{
    use ElementTrait;

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

    /** @var Carbon */
    protected $previousDate;

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
        Carbon $previousDate,
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
        $this->previousDate = $previousDate;
        $this->level = $level;
    }

    public function jsonSerialize(): array
    {
        return [
            'inn' => $this->inn,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'birthDate' => $this->birthDate->toDateString(),
            'score' => [
                'date' => $this->date->toDateString(),
                'value' => $this->score
            ],
            'previousScore' => [
                'date' => $this->previousDate->toDateString(),
                'value' => $this->previousScore,
            ]
        ];
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

    public function getPreviousDate(): Carbon
    {
        return $this->previousDate;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
