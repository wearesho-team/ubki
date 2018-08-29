<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Flag;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class FlagTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Flag
 * @internal
 */
class FlagTest extends ReferenceTestCase
{
    public function testYes(): void
    {
        $this->fakeReference = Flag::YES(static::DESCRIPTION);
        $this->assertEquals(
            Flag::YES(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testConsumer(): void
    {
        $this->fakeReference = Flag::CONSUMER(static::DESCRIPTION);
        $this->assertEquals(
            Flag::CONSUMER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testNo(): void
    {
        $this->fakeReference = Flag::NO(static::DESCRIPTION);
        $this->assertEquals(
            Flag::NO(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuarantor(): void
    {
        $this->fakeReference = Flag::GUARANTOR(static::DESCRIPTION);
        $this->assertEquals(
            Flag::GUARANTOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
