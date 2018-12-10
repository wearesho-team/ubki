<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class DescriptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RatingDescription
 * @internal
 */
class RatingDescriptionTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\RatingDescription;

    protected const ELEMENT = Ubki\Data\Elements\RatingDescription::class;

    public const CREDITS_COUNT = 200;
    public const OPENED_CREDITS_COUNT = 10;
    public const OPENED_CREDIT_DESCRIPTION = 'testDescription';
    public const CLOSED_CREDITS_COUNT = 50;
    public const EXPIRES = 'testExpires';
    public const MAX_OVERDUE = 'testMaxOverdue';
    public const UPDATED_AT = '2018-03-12';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\RatingDescription::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'creditsCount',
            'openCreditsCount',
            'openCreditsDescription',
            'closedCreditsCount',
            'expires',
            'maxOverdue',
            'updatedAt'
        ];
    }
}
