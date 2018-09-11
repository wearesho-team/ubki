<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Wearesho\Bobra\Ubki\Data\Collections\Steps;
use Wearesho\Bobra\Ubki\Data\Elements\Step;
use Wearesho\Bobra\Ubki\Data\Elements\Trace;

use PHPUnit\Framework\TestCase;

/**
 * Class TraceTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Trace
 * @internal
 */
class TraceTest extends TestCase
{
    protected const NAME = 'testName';
    protected const START = 'testStart';
    protected const END = 'testEnd';

    /** @var Trace */
    protected $fakeTrace;

    protected function setUp(): void
    {
        $this->fakeTrace = new Trace(
            new Steps([
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                ),
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                ),
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                )
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'steps' => [
                    new Step(
                        static::NAME,
                        static::START,
                        static::END
                    ),
                    new Step(
                        static::NAME,
                        static::START,
                        static::END
                    ),
                    new Step(
                        static::NAME,
                        static::START,
                        static::END
                    )
                ],
            ],
            $this->fakeTrace->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Trace::TAG,
            $this->fakeTrace->tag()
        );
    }

    public function testGetSteps(): void
    {
        $this->assertEquals(
            new Steps([
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                ),
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                ),
                new Step(
                    static::NAME,
                    static::START,
                    static::END
                )
            ]),
            $this->fakeTrace->getSteps()
        );
    }
}
