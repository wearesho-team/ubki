<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class BalanceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class BalanceTest extends TestCase
{
    protected const VALUE = 123.45;
    protected const DATE = '2018-03-12 12:12:12';

    /** @var Ubki\Data\Balance */
    protected $balance;

    protected function setUp(): void
    {
        $this->balance = Ubki\Data\Balance::make(
            static::VALUE,
            Carbon::parse(static::DATE)
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->balance->getValue());
    }

    public function testGetDate(): void
    {
        $this->assertEquals(static::DATE, Carbon::make($this->balance->getDate())->toDateTimeString());
    }
}
