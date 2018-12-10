<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingFactorsTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 */
class RatingFactorsTestCase extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\RatingFactors;

    public const COUNT = 1;
    public const DESCRIPTION = 'testDescription';
    public const TEXT = 'testText';

    protected function attributesNames(): array
    {
        return [
            'count',
            'description',
            'comments',
        ];
    }
}
