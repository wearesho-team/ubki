<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Decision;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class DecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Decision
 * @internal
 */
class DecisionTest extends ReferenceTestCase
{
    public function testPositive(): void
    {
        $this->fakeReference = Decision::POSITIVE(static::DESCRIPTION);
        $this->assertEquals(
            Decision::POSITIVE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testNegative(): void
    {
        $this->fakeReference = Decision::NEGATIVE(static::DESCRIPTION);
        $this->assertEquals(
            Decision::NEGATIVE(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
