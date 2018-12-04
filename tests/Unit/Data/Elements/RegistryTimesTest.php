<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class RegistryTimesTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RegistryTimes
 * @internal
 */
class RegistryTimesTest extends TestCase
{
    protected const BY_HOUR = 1;
    protected const BY_DAY = 2;
    protected const BY_WEEK = 3;
    protected const BY_MONTH = 4;
    protected const BY_QUARTER = 5;
    protected const BY_YEAR = 10;
    protected const BY_MORE_YEAR = 200;

    /** @var Data\Elements\RegistryTimes */
    protected $fakeRegistryTimes;

    protected function setUp(): void
    {
        $this->fakeRegistryTimes = new Data\Elements\RegistryTimes(
            static::BY_HOUR,
            static::BY_DAY,
            static::BY_WEEK,
            static::BY_MONTH,
            static::BY_QUARTER,
            static::BY_YEAR,
            static::BY_MORE_YEAR
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Data\Interfaces\RegistryTimes::BY_HOUR => static::BY_HOUR,
                Data\Interfaces\RegistryTimes::BY_DAY => static::BY_DAY,
                Data\Interfaces\RegistryTimes::BY_WEEK => static::BY_WEEK,
                Data\Interfaces\RegistryTimes::BY_MONTH => static::BY_MONTH,
                Data\Interfaces\RegistryTimes::BY_QUARTER => static::BY_QUARTER,
                Data\Interfaces\RegistryTimes::BY_YEAR => static::BY_YEAR,
                Data\Interfaces\RegistryTimes::BY_MORE_YEAR => static::BY_MORE_YEAR,
            ],
            $this->fakeRegistryTimes->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Data\Interfaces\RegistryTimes::TAG,
            $this->fakeRegistryTimes->tag()
        );
    }

    public function testGetByHour(): void
    {
        $this->assertEquals(
            static::BY_HOUR,
            $this->fakeRegistryTimes->getByHour()
        );
    }

    public function testGetByYear(): void
    {
        $this->assertEquals(
            static::BY_YEAR,
            $this->fakeRegistryTimes->getByYear()
        );
    }

    public function testGetByMoreYear(): void
    {
        $this->assertEquals(
            static::BY_MORE_YEAR,
            $this->fakeRegistryTimes->getByMoreYear()
        );
    }

    public function testGetByWeek(): void
    {
        $this->assertEquals(
            static::BY_WEEK,
            $this->fakeRegistryTimes->getByWeek()
        );
    }

    public function testGetByMonth(): void
    {
        $this->assertEquals(
            static::BY_MONTH,
            $this->fakeRegistryTimes->getByMonth()
        );
    }

    public function testGetByDay(): void
    {
        $this->assertEquals(
            static::BY_DAY,
            $this->fakeRegistryTimes->getByDay()
        );
    }

    public function testGetByQuarter(): void
    {
        $this->assertEquals(
            static::BY_QUARTER,
            $this->fakeRegistryTimes->getByQuarter()
        );
    }
}
