<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RequestData
 * @internal
 */
class RequestDataTest extends TestCase
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

    public function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\RequestData::VERSION,
            Ubki\Data\Interfaces\RequestData::TYPE,
            Ubki\Data\Interfaces\RequestData::REASON,
            Ubki\Data\Interfaces\RequestData::DATE,
            Ubki\Data\Interfaces\RequestData::ID,
            Ubki\Data\Interfaces\RequestData::INITIATOR,
        ];
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
