<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class DealTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\InsuranceDeal
 * @internal
 */
class InsuranceDealTest extends TestCase
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

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Elements\InsuranceDeal::INN,
            Ubki\Data\Elements\InsuranceDeal::ID,
            Ubki\Data\Elements\InsuranceDeal::INFORMATION_DATE,
            Ubki\Data\Elements\InsuranceDeal::START_DATE,
            Ubki\Data\Elements\InsuranceDeal::END_DATE,
            Ubki\Data\Elements\InsuranceDeal::TYPE,
            Ubki\Data\Elements\InsuranceDeal::STATUS,
            'events',
            Ubki\Data\Elements\InsuranceDeal::ACTUAL_END_DATE,
        ];
    }

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
