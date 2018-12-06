<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class NegativeRatingFactorsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 */
class NegativeRatingFactorsTest extends RatingFactorsTestCase
{
    protected const ELEMENT = Ubki\Data\Elements\NegativeRatingFactors::class;

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\NegativeRatingFactors::TAG;
    }
}
