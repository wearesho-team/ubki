<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\Step;

/**
 * Class StepTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass Step
 * @internal
 */
class StepTest extends TestCase
{
    protected const NAME = 'testName';
    protected const START = 'testStart';
    protected const END = 'testEnd';

    /** @var Step */
    protected $fakeStep;

    protected function setUp(): void
    {
        $this->fakeStep = new Step(
            static::NAME,
            static::START,
            static::END
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'name' => static::NAME,
                'start' => static::START,
                'end' => static::END
            ],
            $this->fakeStep->jsonSerialize()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeStep->getName()
        );
    }

    public function testGetEnd(): void
    {
        $this->assertEquals(
            static::END,
            $this->fakeStep->getEnd()
        );
    }

    public function testGetStart(): void
    {
        $this->assertEquals(
            static::START,
            $this->fakeStep->getStart()
        );
    }
}
