<?php

namespace Wearesho\Bobra\Ubki\Tests\Element;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Element
 */
class ContactTest extends Ubki\Tests\Extend\ElementTestCase
{
    protected const TAG = 'cont';

    /** @var Ubki\Element\Contact */
    protected $block;

    /** @var Carbon */
    protected $now;

    protected function setUp(): void
    {
        $this->now = Carbon::now();

        $this->block = new Ubki\Element\Contact(
            $this->now,
            '+380930439475',
            1,
            '1231231230'
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals(1, $this->block->type);
        $this->assertEquals($this->now, $this->block->createdAt);
        $this->assertEquals('+380930439475', $this->block->value);
        $this->assertEquals('1231231230', $this->block->inn);
    }
}
