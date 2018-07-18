<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class ContactTest extends Ubki\Tests\Extend\BlockTestCase
{
    /** @var Ubki\Block\Contact */
    protected $block;

    protected function setUp(): void
    {
        Carbon::setTestNow(Carbon::now());

        $this->block = new Ubki\Block\Contact(
            Carbon::getTestNow(),
            '+380930439475',
            1
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            1,
            $this->block->getType()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::getTestNow()
                ->toDateTimeString(),
            Carbon::instance($this->block->getCreatedAt())
                ->toDateTimeString()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            '+380930439475',
            $this->block->getValue()
        );
    }

    public function testGetInn(): void
    {
        $this->assertNull(
            $this->block->getInn()
        );
    }

    public function tag(): string
    {
        return 'cont';
    }
}
