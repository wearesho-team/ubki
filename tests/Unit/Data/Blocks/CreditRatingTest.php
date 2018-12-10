<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRatingTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditRating
 * @internal
 */
class CreditRatingTest extends TestCase
{
    use Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait\CreditRating;

    protected const ELEMENT = Ubki\Data\Blocks\CreditRating::class;

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\CreditRating::ID;
    }

    protected function attributesNames(): array
    {
        return [
            'score',
            'description',
            'comments',
            'positiveFactors',
            'negativeFactors',
        ];
    }
}
