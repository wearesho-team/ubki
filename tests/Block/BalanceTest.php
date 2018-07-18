<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class BalanceTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class BalanceTest extends Ubki\Tests\Extend\BlockTestCase
{
    protected const TEST_TAG = 'balance';

    /** @var Ubki\Block\Balance */
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Ubki\Block\Balance(
            2004.75,
            Carbon::parse('2018-09-09'),
            Carbon::parse('12:10:45')
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(2004.75, $this->block->getValue());
    }

    public function testGetTime(): void
    {
        $this->assertEquals('2018-09-09', Carbon::parse($this->block->getDate())->toDateString());
    }

    public function testGetDate(): void
    {
        $this->assertEquals('12:10:45', Carbon::parse($this->block->getTime())->toTimeString());
    }

    public function test__construct(): void
    {
        $this->assertNotEmpty($this->block);
        $this->assertEquals(
            new Ubki\Block\Balance(
                2004.75,
                Carbon::parse('2018-09-09'),
                Carbon::parse('12:10.45')
            ),
            $this->block
        );
    }

    public function tag(): string
    {
        return 'balance';
    }
}
