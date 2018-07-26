<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Data\Language;

use PHPUnit\Framework\TestCase;

/**
 * Class LanguageTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class LanguageTest extends TestCase
{
    public function testLav(): void
    {
        $description = 'латышский';
        $language = Language::LAV($description);
        $this->assertEquals(Language::LAV, $language->getValue());
        $this->assertEquals('LAV', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testKaz(): void
    {
        $description = 'казахский';
        $language = Language::KAZ($description);
        $this->assertEquals(Language::KAZ, $language->getValue());
        $this->assertEquals('KAZ', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testRus(): void
    {
        $description = 'русский';
        $language = Language::RUS($description);
        $this->assertEquals(Language::RUS, $language->getValue());
        $this->assertEquals('RUS', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testKat(): void
    {
        $description = 'грузинский';
        $language = Language::KAT($description);
        $this->assertEquals(Language::KAT, $language->getValue());
        $this->assertEquals('KAT', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testUkr(): void
    {
        $description = 'украинский';
        $language = Language::UKR($description);
        $this->assertEquals(Language::UKR, $language->getValue());
        $this->assertEquals('UKR', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testEll(): void
    {
        $description = 'греческий';
        $language = Language::ELL($description);
        $this->assertEquals(Language::ELL, $language->getValue());
        $this->assertEquals('ELL', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testZho(): void
    {
        $description = 'китайский';
        $language = Language::ZHO($description);
        $this->assertEquals(Language::ZHO, $language->getValue());
        $this->assertEquals('ZHO', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }

    public function testEng(): void
    {
        $description = 'английский';
        $language = Language::ENG($description);
        $this->assertEquals(Language::ENG, $language->getValue());
        $this->assertEquals('ENG', $language->getKey());
        $this->assertEquals($description, $language->getDescription());
    }
}
