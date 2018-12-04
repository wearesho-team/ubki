<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class RequestDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RequestData
 * @internal
 */
class RequestDataTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';

    /** @var Ubki\Data\Elements\RequestData */
    protected $fakeRequestData;

    protected function setUp(): void
    {
        $this->fakeRequestData = new Ubki\Data\Elements\RequestData(
            Ubki\Dictionaries\RequestType::EXPORT(),
            Ubki\Dictionaries\RequestReason::EXPORT(),
            Carbon::parse(static::DATE),
            static::ID,
            Ubki\Dictionaries\RequestInitiator::PARTNER()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\RequestData::VERSION => '1.0',
                Ubki\Data\Interfaces\RequestData::TYPE => Ubki\Dictionaries\RequestType::EXPORT(),
                Ubki\Data\Interfaces\RequestData::REASON => Ubki\Dictionaries\RequestReason::EXPORT(),
                Ubki\Data\Interfaces\RequestData::DATE => Carbon::parse(static::DATE),
                Ubki\Data\Interfaces\RequestData::ID => static::ID,
                Ubki\Data\Interfaces\RequestData::INITIATOR => Ubki\Dictionaries\RequestInitiator::PARTNER(),
            ],
            $this->fakeRequestData->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\RequestData::TAG,
            $this->fakeRequestData->tag()
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
            Ubki\Dictionaries\RequestType::EXPORT(),
            $this->fakeRequestData->getType()
        );
    }

    public function testGetInitiator(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\RequestInitiator::PARTNER(),
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
            Ubki\Dictionaries\RequestReason::EXPORT(),
            $this->fakeRequestData->getReason()
        );
    }
}
