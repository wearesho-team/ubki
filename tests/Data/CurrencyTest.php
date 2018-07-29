<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\Currency;

use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class CurrencyTest extends TestCase
{
    public function testChf(): void
    {
        $description = 'швейцарский франк';
        $currency = Currency::CHF($description);
        $this->assertEquals(Currency::CHF, $currency->getValue());
        $this->assertEquals('CHF', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testGel(): void
    {
        $description = 'грузинский лари';
        $currency = Currency::GEL($description);
        $this->assertEquals(Currency::GEL, $currency->getValue());
        $this->assertEquals('GEL', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testRub(): void
    {
        $description = 'российский рубль';
        $currency = Currency::RUB($description);
        $this->assertEquals(Currency::RUB, $currency->getValue());
        $this->assertEquals('RUB', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testUah(): void
    {
        $description = 'украинская гривна';
        $currency = Currency::UAH($description);
        $this->assertEquals(Currency::UAH, $currency->getValue());
        $this->assertEquals('UAH', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testXag(): void
    {
        $description = 'серебро';
        $currency = Currency::XAG($description);
        $this->assertEquals(Currency::XAG, $currency->getValue());
        $this->assertEquals('XAG', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testPln(): void
    {
        $description = 'польский злотый';
        $currency = Currency::PLN($description);
        $this->assertEquals(Currency::PLN, $currency->getValue());
        $this->assertEquals('PLN', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testByn(): void
    {
        $description = 'белорусский рубль';
        $currency = Currency::BYN($description);
        $this->assertEquals(Currency::BYN, $currency->getValue());
        $this->assertEquals('BYN', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testUsd(): void
    {
        $description = 'доллар США';
        $currency = Currency::USD($description);
        $this->assertEquals(Currency::USD, $currency->getValue());
        $this->assertEquals('USD', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testEur(): void
    {
        $description = 'евро';
        $currency = Currency::EUR($description);
        $this->assertEquals(Currency::EUR, $currency->getValue());
        $this->assertEquals('EUR', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testGbp(): void
    {
        $description = 'Английский фунт стерлингов';
        $currency = Currency::GBP($description);
        $this->assertEquals(Currency::GBP, $currency->getValue());
        $this->assertEquals('GBP', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }

    public function testXau(): void
    {
        $description = 'золото';
        $currency = Currency::XAU($description);
        $this->assertEquals(Currency::XAU, $currency->getValue());
        $this->assertEquals('XAU', $currency->getKey());
        $this->assertEquals($description, $currency->getDescription());
    }
}
