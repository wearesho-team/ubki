<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\FamilyStatus;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class FamilyStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass FamilyStatus
 * @internal
 */
class FamilyStatusTest extends ReferenceTestCase
{
    public function testMarried(): void
    {
        $this->fakeReference = FamilyStatus::MARRIED(static::DESCRIPTION);
        $this->assertEquals(
            FamilyStatus::MARRIED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testWidow(): void
    {
        $this->fakeReference = FamilyStatus::WIDOW(static::DESCRIPTION);
        $this->assertEquals(
            FamilyStatus::WIDOW(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCivil(): void
    {
        $this->fakeReference = FamilyStatus::CIVIL(static::DESCRIPTION);
        $this->assertEquals(
            FamilyStatus::CIVIL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSingle(): void
    {
        $this->fakeReference = FamilyStatus::SINGLE(static::DESCRIPTION);
        $this->assertEquals(
            FamilyStatus::SINGLE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDivorced(): void
    {
        $this->fakeReference = FamilyStatus::DIVORCED(static::DESCRIPTION);
        $this->assertEquals(
            FamilyStatus::DIVORCED(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
