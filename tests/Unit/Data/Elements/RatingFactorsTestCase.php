<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingFactorsTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 */
class RatingFactorsTestCase extends TestCase
{
    use ArgumentsTrait\RatingFactors;

    public const COUNT = 1;
    public const DESCRIPTION = 'testDescription';
    public const TEXT = 'testText';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Elements\RatingFactors::COUNT,
            Ubki\Data\Elements\RatingFactors::TEXT,
            Ubki\Data\Elements\RatingFactors::COMMENTS,
        ];
    }

    protected function attributesNames(): array
    {
        return [
            'count',
            'description',
            'comments',
        ];
    }
}
