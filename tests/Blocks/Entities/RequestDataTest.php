<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\RequestData;
use Wearesho\Bobra\Ubki\References;

/**
 * Class RequestDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass RequestData
 * @internal
 */
class RequestDataTest extends TestCase
{
    protected const DATE = '2018-03-12 00:00:00';
    protected const ID = 'testId';

    /** @var RequestData */
    protected $fakeRequestData;

    protected function setUp(): void
    {
        $this->fakeRequestData = new RequestData(
            References\RequestType::EXPORT(),
            References\RequestReason::EXPORT(),
            Carbon::parse(static::DATE),
            static::ID,
            References\RequestInitiator::PARTNER()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'version' => '1.0',
                'type' => References\RequestType::EXPORT()->getKey(),
                'reason' => References\RequestReason::EXPORT()->getKey(),
                'date' => static::DATE,
                'id' => static::ID,
                'initiator' => References\RequestInitiator::PARTNER()->getKey(),
            ],
            $this->fakeRequestData->jsonSerialize()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            Carbon::instance($this->fakeRequestData->getDate())->toDateTimeString()
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
            References\RequestType::EXPORT(),
            $this->fakeRequestData->getType()
        );
    }

    public function testGetInitiator(): void
    {
        $this->assertEquals(
            References\RequestInitiator::PARTNER(),
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
            References\RequestReason::EXPORT(),
            $this->fakeRequestData->getReason()
        );
    }
}
