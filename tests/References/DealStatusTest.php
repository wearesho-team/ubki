<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\DealStatus;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class DealStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass DealStatus
 * @internal
 */
class DealStatusTest extends ReferenceTestCase
{
    public function testAnnulled(): void
    {
        $this->fakeReference = DealStatus::ANNULLED(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::ANNULLED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testProlonged(): void
    {
        $this->fakeReference = DealStatus::PROLONGED(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::PROLONGED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLiquidation(): void
    {
        $this->fakeReference = DealStatus::LIQUIDATION(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::LIQUIDATION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testWriteOff(): void
    {
        $this->fakeReference = DealStatus::WRITE_OFF(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::WRITE_OFF(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testReplacement(): void
    {
        $this->fakeReference = DealStatus::REPLACEMENT(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::REPLACEMENT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testTermination(): void
    {
        $this->fakeReference = DealStatus::TERMINATION(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::TERMINATION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRestructured(): void
    {
        $this->fakeReference = DealStatus::RESTRUCTURED(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::RESTRUCTURED(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testClose(): void
    {
        $this->fakeReference = DealStatus::CLOSE(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::CLOSE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSold(): void
    {
        $this->fakeReference = DealStatus::SOLD(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::SOLD(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testOpen(): void
    {
        $this->fakeReference = DealStatus::OPEN(static::DESCRIPTION);
        $this->assertEquals(
            DealStatus::OPEN(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
