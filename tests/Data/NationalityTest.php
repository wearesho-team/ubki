<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\Nationality;

use PHPUnit\Framework\TestCase;

/**
 * Class NationalityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class NationalityTest extends TestCase
{
    public function testIsrael(): void
    {
        $description = 'Израиль';
        $nationality = Nationality::ISRAEL($description);
        $this->assertEquals(Nationality::ISRAEL, $nationality->getValue());
        $this->assertEquals('ISRAEL', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testTurkey(): void
    {
        $description = 'Турция';
        $nationality = Nationality::TURKEY($description);
        $this->assertEquals(Nationality::TURKEY, $nationality->getValue());
        $this->assertEquals('TURKEY', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testStateless(): void
    {
        $description = 'Без гражданства';
        $nationality = Nationality::STATELESS($description);
        $this->assertEquals(Nationality::STATELESS, $nationality->getValue());
        $this->assertEquals('STATELESS', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testKazakhstan(): void
    {
        $description = 'Казахстан';
        $nationality = Nationality::KAZAKHSTAN($description);
        $this->assertEquals(Nationality::KAZAKHSTAN, $nationality->getValue());
        $this->assertEquals('KAZAKHSTAN', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testArmenia(): void
    {
        $description = 'Армения';
        $nationality = Nationality::ARMENIA($description);
        $this->assertEquals(Nationality::ARMENIA, $nationality->getValue());
        $this->assertEquals('ARMENIA', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testGermany(): void
    {
        $description = 'Германия';
        $nationality = Nationality::GERMANY($description);
        $this->assertEquals(Nationality::GERMANY, $nationality->getValue());
        $this->assertEquals('GERMANY', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testUkraine(): void
    {
        $description = 'Украина';
        $nationality = Nationality::UKRAINE($description);
        $this->assertEquals(Nationality::UKRAINE, $nationality->getValue());
        $this->assertEquals('UKRAINE', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testBelarus(): void
    {
        $description = 'Беларусь';
        $nationality = Nationality::BELARUS($description);
        $this->assertEquals(Nationality::BELARUS, $nationality->getValue());
        $this->assertEquals('BELARUS', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testGeorgia(): void
    {
        $description = 'Грузия';
        $nationality = Nationality::GEORGIA($description);
        $this->assertEquals(Nationality::GEORGIA, $nationality->getValue());
        $this->assertEquals('GEORGIA', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testAzerbaijan(): void
    {
        $description = 'Азербайджан';
        $nationality = Nationality::AZERBAIJAN($description);
        $this->assertEquals(Nationality::AZERBAIJAN, $nationality->getValue());
        $this->assertEquals('AZERBAIJAN', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testUzbekistan(): void
    {
        $description = 'Узбекистан';
        $nationality = Nationality::UZBEKISTAN($description);
        $this->assertEquals(Nationality::UZBEKISTAN, $nationality->getValue());
        $this->assertEquals('UZBEKISTAN', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testRussianFederation(): void
    {
        $description = 'Российская Федерация';
        $nationality = Nationality::RUSSIAN_FEDERATION($description);
        $this->assertEquals(Nationality::RUSSIAN_FEDERATION, $nationality->getValue());
        $this->assertEquals('RUSSIAN_FEDERATION', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testUsa(): void
    {
        $description = 'Соединенные Штаты Америки';
        $nationality = Nationality::USA($description);
        $this->assertEquals(Nationality::USA, $nationality->getValue());
        $this->assertEquals('USA', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }

    public function testPoland(): void
    {
        $description = 'Польша';
        $nationality = Nationality::POLAND($description);
        $this->assertEquals(Nationality::POLAND, $nationality->getValue());
        $this->assertEquals('POLAND', $nationality->getKey());
        $this->assertEquals($description, $nationality->getDescription());
    }
}
