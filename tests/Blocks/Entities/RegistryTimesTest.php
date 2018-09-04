<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Wearesho\Bobra\Ubki\Data\Elements\RegistryTimes;

use PHPUnit\Framework\TestCase;

/**
 * Class RegistryTimesTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass RegistryTimes
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

    /** @var RegistryTimes */
    protected $fakeRegistryTimes;

    protected function setUp(): void
    {
        $this->fakeRegistryTimes = new RegistryTimes(
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
                'byHour' => static::BY_HOUR,
                'byDay' => static::BY_DAY,
                'byWeek' => static::BY_WEEK,
                'byMonth' => static::BY_MONTH,
                'byQuarter' => static::BY_QUARTER,
                'byYear' => static::BY_YEAR,
                'byMoreYear' => static::BY_MORE_YEAR,
            ],
            $this->fakeRegistryTimes->jsonSerialize()
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
