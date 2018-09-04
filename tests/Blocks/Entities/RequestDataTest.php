<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\RequestData;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class RequestDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass RequestData
 * @internal
 */
class RequestDataTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';

    /** @var RequestData */
    protected $fakeRequestData;

    protected function setUp(): void
    {
        $this->fakeRequestData = new RequestData(
            Dictionaries\RequestType::EXPORT(),
            Dictionaries\RequestReason::EXPORT(),
            Carbon::parse(static::DATE),
            static::ID,
            Dictionaries\RequestInitiator::PARTNER()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'version' => '1.0',
                'type' => Dictionaries\RequestType::EXPORT()->getKey(),
                'reason' => Dictionaries\RequestReason::EXPORT()->getKey(),
                'date' => static::DATE,
                'id' => static::ID,
                'initiator' => Dictionaries\RequestInitiator::PARTNER()->getKey(),
            ],
            $this->fakeRequestData->jsonSerialize()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            Carbon::instance($this->fakeRequestData->getDate())->toDateString()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeRequestData->getId()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Dictionaries\RequestType::EXPORT(),
            $this->fakeRequestData->getType()
        );
    }

    public function testGetInitiator(): void
    {
        $this->assertEquals(
            Dictionaries\RequestInitiator::PARTNER(),
            $this->fakeRequestData->getInitiator()
        );
    }

    public function testGetVersion(): void
    {
        $this->assertEquals(
            '1.0',
            $this->fakeRequestData->getVersion()
        );
    }

    public function testGetReason(): void
    {
        $this->assertEquals(
            Dictionaries\RequestReason::EXPORT(),
            $this->fakeRequestData->getReason()
        );
    }
}
