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
    public function testRus(): void
    {
        $this->fakeReference = Language::RUS(static::DESCRIPTION);
        $this->assertEquals(Language::RUS(static::DESCRIPTION), $this->fakeReference);
    }

    public function testLav(): void
    {
        $this->fakeReference = Language::LAV(static::DESCRIPTION);
        $this->assertEquals(Language::LAV(static::DESCRIPTION), $this->fakeReference);
    }

    public function testKat(): void
    {
        $this->fakeReference = Language::KAT(static::DESCRIPTION);
        $this->assertEquals(Language::KAT(static::DESCRIPTION), $this->fakeReference);
    }

    public function testEng(): void
    {
        $this->fakeReference = Language::ENG(static::DESCRIPTION);
        $this->assertEquals(Language::ENG(static::DESCRIPTION), $this->fakeReference);
    }

    public function testEll(): void
    {
        $this->fakeReference = Language::ELL(static::DESCRIPTION);
        $this->assertEquals(Language::ELL(static::DESCRIPTION), $this->fakeReference);
    }

    public function testUkr(): void
    {
        $this->fakeReference = Language::UKR(static::DESCRIPTION);
        $this->assertEquals(Language::UKR(static::DESCRIPTION), $this->fakeReference);
    }

    public function testZho(): void
    {
        $this->fakeReference = Language::ZHO(static::DESCRIPTION);
        $this->assertEquals(Language::ZHO(static::DESCRIPTION), $this->fakeReference);
    }

    public function testKaz(): void
    {
        $this->fakeReference = Language::KAZ(static::DESCRIPTION);
        $this->assertEquals(Language::KAZ(static::DESCRIPTION), $this->fakeReference);
    }
}
