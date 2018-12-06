<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait RatingDescription
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait RatingDescription
{
    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::CREDITS_COUNT,
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::OPENED_CREDITS_COUNT,
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::OPENED_CREDIT_DESCRIPTION,
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::CLOSED_CREDITS_COUNT,
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::EXPIRES,
            Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::MAX_OVERDUE,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\RatingDescriptionTest::UPDATED_AT)
        ];
    }
}
