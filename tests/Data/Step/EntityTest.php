<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Step;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Step
 */
class EntityTest extends Ubki\Tests\Extend\ElementTestCase
{
    protected const TAG = 'step';

    /** @var Ubki\Data\Step\Entity */
    protected $element;

    /** @var Carbon */
    protected $start;

    /** @var Carbon */
    protected $end;

    public function testGetEnd(): void
    {
        $this->assertEquals(
            $this->end,
            $this->element->getEnd()
        );
        $this->assertTrue(
            Carbon::instance($this->element->getStart())
                ->lessThanOrEqualTo(Carbon::instance($this->element->getEnd()))
        );
    }

    public function testGetStart(): void
    {
        $this->assertEquals(
            $this->start,
            $this->element->getStart()
        );
        $this->assertTrue(
            Carbon::instance($this->element->getEnd())
                ->greaterThanOrEqualTo(Carbon::instance($this->element->getStart()))
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            'build report',
            $this->element->getName()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage End date must be greater than start date!
     */
    public function testInvalidDate(): void
    {
        $this->start->addMinutes(10);

        $this->element = new Ubki\Data\Step\Entity(
            'test',
            $this->start,
            $this->end
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'name' => 'build report',
                'start' => $this->start->toDateTimeString(),
                'end' => $this->end->toDateTimeString()
            ],
            $this->element->jsonSerialize()
        );
    }

    protected function setUp(): void
    {
        $this->start = Carbon::now();
        $this->end = Carbon::instance($this->start)->addMinute();

        $this->element = new Ubki\Data\Step\Entity(
            'build report',
            $this->start,
            $this->end
        );
    }
}
