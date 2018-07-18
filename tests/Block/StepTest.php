<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class StepTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class StepTest extends Ubki\Tests\Extend\BlockTestCase
{
    /** @var Ubki\Block\Step */
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Ubki\Block\Step(
            'insert',
            Carbon::parse('2018-09-09 12:12:12.267'),
            Carbon::parse('2018-09-09 12:12:12.457')
        );
    }

    public function testGetStartTime(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-09-09 12:12:12.267'),
            Carbon::instance($this->block->getStartTime())
        );
    }

    public function test__construct(): void
    {
        $this->assertNotEmpty($this->block);
        $this->assertEquals(
            new Ubki\Block\Step(
                'insert',
                Carbon::parse('2018-09-09 12:12:12.267'),
                Carbon::parse('2018-09-09 12:12:12.457')
            ),
            $this->block
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals('insert', $this->block->getName());
    }

    public function testGetEndTime(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-09-09 12:12:12.457'),
            Carbon::instance($this->block->getEndTime())
        );
    }

    public function tag(): string
    {
        return 'step';
    }
}
