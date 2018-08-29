<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Language;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class LanguageTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Language
 * @internal
 */
class LanguageTest extends ReferenceTestCase
{
    public function testKAT(): void
    {
        $this->fakeReference = Language::KAT(static::DESCRIPTION);
        $this->assertEquals(
            Language::KAT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testENG(): void
    {
        $this->fakeReference = Language::ENG(static::DESCRIPTION);
        $this->assertEquals(
            Language::ENG(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLAV(): void
    {
        $this->fakeReference = Language::LAV(static::DESCRIPTION);
        $this->assertEquals(
            Language::LAV(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRUS(): void
    {
        $this->fakeReference = Language::RUS(static::DESCRIPTION);
        $this->assertEquals(
            Language::RUS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testZHO(): void
    {
        $this->fakeReference = Language::ZHO(static::DESCRIPTION);
        $this->assertEquals(
            Language::ZHO(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUKR(): void
    {
        $this->fakeReference = Language::UKR(static::DESCRIPTION);
        $this->assertEquals(
            Language::UKR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testELL(): void
    {
        $this->fakeReference = Language::ELL(static::DESCRIPTION);
        $this->assertEquals(
            Language::ELL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testKAZ(): void
    {
        $this->fakeReference = Language::KAZ(static::DESCRIPTION);
        $this->assertEquals(
            Language::KAZ(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
