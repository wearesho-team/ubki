<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Nationality;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class NationalityTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Nationality
 * @internal
 */
class NationalityTest extends ReferenceTestCase
{
    public function testIsrael(): void
    {
        $this->fakeReference = Nationality::ISRAEL(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::ISRAEL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testAzerbaijan(): void
    {
        $this->fakeReference = Nationality::AZERBAIJAN(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::AZERBAIJAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGeorgia(): void
    {
        $this->fakeReference = Nationality::GEORGIA(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::GEORGIA(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUzbekistan(): void
    {
        $this->fakeReference = Nationality::UZBEKISTAN(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::UZBEKISTAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUSA(): void
    {
        $this->fakeReference = Nationality::USA(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::USA(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testTurkey(): void
    {
        $this->fakeReference = Nationality::TURKEY(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::TURKEY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGERMANY(): void
    {
        $this->fakeReference = Nationality::GERMANY(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::GERMANY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPoland(): void
    {
        $this->fakeReference = Nationality::POLAND(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::POLAND(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testKazakhstan(): void
    {
        $this->fakeReference = Nationality::KAZAKHSTAN(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::KAZAKHSTAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUkraine(): void
    {
        $this->fakeReference = Nationality::UKRAINE(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::UKRAINE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testStateless(): void
    {
        $this->fakeReference = Nationality::STATELESS(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::STATELESS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBelarus(): void
    {
        $this->fakeReference = Nationality::BELARUS(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::BELARUS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRussianFederation(): void
    {
        $this->fakeReference = Nationality::RUSSIAN_FEDERATION(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::RUSSIAN_FEDERATION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testArmenia(): void
    {
        $this->fakeReference = Nationality::ARMENIA(static::DESCRIPTION);
        $this->assertEquals(
            Nationality::ARMENIA(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
