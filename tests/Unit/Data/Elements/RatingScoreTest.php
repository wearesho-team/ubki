<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingScoreTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RatingScore
 * @internal
 */
class RatingScoreTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\RatingScore;

    protected const ELEMENT = Ubki\Data\Elements\RatingScore::class;

    public const INN = 'testInn';
    public const SURNAME = 'testSurname';
    public const NAME = 'testName';
    public const PATRONYMIC = 'testPatronymic';
    public const BIRTH_DATE = '1998-03-12';
    public const SCORE = 'testScore';
    public const PREVIOUS_SCORE = 'testPreviousScore';
    public const DATE = '2018-03-12';
    public const LEVEL = 'testLevel';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\RatingScore::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'inn',
            'surname',
            'name',
            'patronymic',
            'birthDate',
            'score',
            'previousScore',
            'date',
            'level'
        ];
    }
}
