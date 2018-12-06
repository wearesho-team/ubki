<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class PositiveRatingFactorsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RatingFactors
 * @internal
 */
class PositiveRatingFactorsTest extends RatingFactorsTestCase
{
    protected const ELEMENT = Ubki\Data\Elements\PositiveRatingFactors::class;

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\PositiveRatingFactors::TAG;
    }
}
