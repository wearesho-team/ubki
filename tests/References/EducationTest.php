<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Education;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class EducationTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Education
 * @internal
 */
class EducationTest extends ReferenceTestCase
{
    public function testHigh(): void
    {
        $this->fakeReference = Education::HIGH(static::DESCRIPTION);
        $this->assertEquals(
            Education::HIGH(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBySelf(): void
    {
        $this->fakeReference = Education::BY_SELF(static::DESCRIPTION);
        $this->assertEquals(
            Education::BY_SELF(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSecondaryUnfinished(): void
    {
        $this->fakeReference = Education::SECONDARY_UNFINISHED(static::DESCRIPTION);
        $this->assertEquals(
            Education::SECONDARY_UNFINISHED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testAcademic(): void
    {
        $this->fakeReference = Education::ACADEMIC(static::DESCRIPTION);
        $this->assertEquals(
            Education::ACADEMIC(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testHighUnfinished(): void
    {
        $this->fakeReference = Education::HIGH_UNFINISHED(static::DESCRIPTION);
        $this->assertEquals(
            Education::HIGH_UNFINISHED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSecondary(): void
    {
        $this->fakeReference = Education::SECONDARY(static::DESCRIPTION);
        $this->assertEquals(
            Education::SECONDARY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSecondaryTech(): void
    {
        $this->fakeReference = Education::SECONDARY_TECH(static::DESCRIPTION);
        $this->assertEquals(
            Education::SECONDARY_TECH(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
