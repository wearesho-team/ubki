<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\SocialStatus;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class SocialStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass SocialStatus
 * @internal
 */
class SocialStatusTest extends ReferenceTestCase
{
    public function testTermTime(): void
    {
        $this->fakeReference = SocialStatus::TERM_TIME(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::TERM_TIME(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testMaternityLeave(): void
    {
        $this->fakeReference = SocialStatus::MATERNITY_LEAVE(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::MATERNITY_LEAVE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testFullTime(): void
    {
        $this->fakeReference = SocialStatus::FULL_TIME(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::FULL_TIME(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPensioner(): void
    {
        $this->fakeReference = SocialStatus::PENSIONER(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::PENSIONER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testStudent(): void
    {
        $this->fakeReference = SocialStatus::STUDENT(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::STUDENT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPartTime(): void
    {
        $this->fakeReference = SocialStatus::PART_TIME(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::PART_TIME(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testTempUnemployed(): void
    {
        $this->fakeReference = SocialStatus::TEMP_UNEMPLOYED(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::TEMP_UNEMPLOYED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testOther(): void
    {
        $this->fakeReference = SocialStatus::OTHER(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::OTHER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPensionerWork(): void
    {
        $this->fakeReference = SocialStatus::PENSIONER_WORK(static::DESCRIPTION);
        $this->assertEquals(
            SocialStatus::PENSIONER_WORK(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
