<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Step;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Step
 *
 * @internal
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

    public function testGetters(): void
    {
        $this->assertEquals($this->end, $this->element->end);
        $this->assertTrue(
            Carbon::instance($this->element->start)
                ->lessThanOrEqualTo(Carbon::instance($this->element->end))
        );
        $this->assertEquals($this->start, $this->element->start);
        $this->assertTrue(
            Carbon::instance($this->element->end)
                ->greaterThanOrEqualTo(Carbon::instance($this->element->start))
        );
        $this->assertEquals('build report', $this->element->name);
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
        $this->assertArraySubset(
            [
                'name' => 'build report',
                'start' => $this->start->toDateTimeString(),
                'end' => $this->end->toDateTimeString()
            ],
            $this->element->jsonSerialize()
        );
    }
}
