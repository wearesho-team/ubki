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
    protected $element;

    /** @var Carbon */
    protected $now;

    protected function setUp(): void
    {
        $this->now = Carbon::now();

        $this->element = new Ubki\Element\Contact(
            $this->now,
            '+380930439475',
            1,
            '1231231230'
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            1,
            $this->element->getType()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            $this->now,
            $this->element->getCreatedAt()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            '+380930439475',
            $this->element->getValue()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals('1231231230', $this->element->getInn());
    }
}
