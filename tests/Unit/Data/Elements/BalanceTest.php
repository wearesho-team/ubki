<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class BalanceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 */
class BalanceTest extends Ubki\Tests\Unit\Data\TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Balance;

    protected const ELEMENT = Ubki\Data\Elements\Balance::class;

    public const VALUE = 12345.67;
    public const DATE = '2018-03-12';
    public const TIME = 'time';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\Balance::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'value',
            'date',
            'time',
        ];
    }
}
