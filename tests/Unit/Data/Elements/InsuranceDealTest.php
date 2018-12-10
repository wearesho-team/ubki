<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class DealTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\InsuranceDeal
 * @internal
 */
class InsuranceDealTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\InsuranceDeal;

    protected const ELEMENT = Ubki\Data\Elements\InsuranceDeal::class;

    public const INN = 'testInn';
    public const ID = 'testId';
    public const INFORMATION_DATE = '2018-03-12';
    public const START_DATE = '2017-03-12';
    public const END_DATE = '2019-03-12';
    public const TYPE = 1;
    public const STATUS = 2;
    public const REQUEST_DATE = '2018-03-12';
    public const DECISION = 1;
    public const DECISION_DATE = '2018-03-12';
    public const ACTUAL_END_DATE = '2020-03-12';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\InsuranceDeal::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'inn',
            'id',
            'informationDate',
            'startDate',
            'endDate',
            'type',
            'status',
            'events',
            'actualEndDate',
        ];
    }
}
