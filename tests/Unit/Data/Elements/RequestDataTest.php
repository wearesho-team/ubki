<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RequestData
 * @internal
 */
class RequestDataTest extends Ubki\Tests\Unit\Data\TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RequestData;

    protected const ELEMENT = Ubki\Data\Elements\RequestData::class;

    public const DATE = '2018-03-12';
    public const ID = 'testId';

    protected function setUp(): void
    {
        parent::setUp();

        array_unshift($this->data, '1.0');
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\RequestData::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'version',
            'type',
            'reason',
            'date',
            'id',
            'initiator',
        ];
    }
}
