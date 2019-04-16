<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data\Rate;

/**
 * Interface Score
 * @package Wearesho\Bobra\Ubki\Contract\Data\Rate
 */
interface Score
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

    public function getInn(): string;

    public function getSurname(): string;

    public function getName(): string;

    public function getPatronymic(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getScore(): string;

    public function getPreviousScore(): string;

    public function getDate(): \DateTimeInterface;

    public function getLevel(): string;
}
