<?php

namespace Wearesho\Bobra\Ubki\Tests\Collection;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class StepTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class StepTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Element\Step::class;

    /** @var Ubki\Collection\Step */
    protected $collection;

    /** @var string[] */
    protected $fakeNames;

    /** @var Carbon[] */
    protected $fakeStarts;

    /** @var Carbon[] */
    protected $fakeEnds;

    public function testCount(): void
    {
        $this->assertEquals(count($this->fakeNames), $this->collection->count());
        $this->assertEquals(count($this->fakeStarts), $this->collection->count());
        $this->assertEquals(count($this->fakeEnds), $this->collection->count());
    }

    public function testGet(): void
    {
        /** @var Ubki\Element\Step $step */
        foreach ($this->collection as $index => $step) {
            $this->assertEquals($this->fakeNames[$index], $step->getName());
            $this->assertEquals($this->fakeStarts[$index], $step->getStart());
            $this->assertEquals($this->fakeEnds[$index], $step->getEnd());
            $this->assertTrue(Carbon::instance($step->getStart())->lessThanOrEqualTo($this->fakeEnds[$index]));
            $this->assertTrue(Carbon::instance($step->getEnd())->greaterThanOrEqualTo($this->fakeStarts[$index]));
            $this->assertTrue(Carbon::instance($step->getStart())->lessThanOrEqualTo($this->fakeStarts[$index]));
            $this->assertTrue(Carbon::instance($step->getEnd())->greaterThanOrEqualTo($this->fakeEnds[$index]));
        }
    }

    protected function setUp(): void
    {
        for ($i = 0; $i < rand(1, 5); $i++) {
            $this->fakeNames[] = random_bytes(15);
            $this->fakeStarts[] = Carbon::create(
                rand(1985, 2020),
                rand(1, 12),
                rand(1, 30),
                rand(1, 24),
                rand(1, 60),
                rand(1, 60)
            );

            $this->fakeEnds[] = $this->fakeStarts[$i];
            $this->fakeEnds[$i]->addMinutes(rand(1, 60));
        }

        $this->collection = new Ubki\Collection\Step();

        foreach ($this->fakeNames as $index => $name) {
            $this->collection->append(new Ubki\Element\Step(
                $name,
                $this->fakeStarts[$index],
                $this->fakeEnds[$index]
            ));
        }
    }
}
