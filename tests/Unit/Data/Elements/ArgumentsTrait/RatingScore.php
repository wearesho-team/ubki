<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait RatingScore
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait RatingScore
{
    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::INN,
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::SURNAME,
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::NAME,
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::PATRONYMIC,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\RatingScoreTest::BIRTH_DATE),
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::SCORE,
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::PREVIOUS_SCORE,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\RatingScoreTest::DATE),
            Ubki\Tests\Unit\Data\Elements\RatingScoreTest::LEVEL
        ];
    }
}
