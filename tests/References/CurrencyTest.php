<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Currency;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CurrencyTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Currency
 * @internal
 */
class CurrencyTest extends ReferenceTestCase
{
    public function testCHF(): void
    {
        $this->fakeReference = Currency::CHF(static::DESCRIPTION);
        $this->assertEquals(
            Currency::CHF(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testXAU(): void
    {
        $this->fakeReference = Currency::XAU(static::DESCRIPTION);
        $this->assertEquals(
            Currency::XAU(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGBP(): void
    {
        $this->fakeReference = Currency::GBP(static::DESCRIPTION);
        $this->assertEquals(
            Currency::GBP(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPLN(): void
    {
        $this->fakeReference = Currency::PLN(static::DESCRIPTION);
        $this->assertEquals(
            Currency::PLN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testEUR(): void
    {
        $this->fakeReference = Currency::EUR(static::DESCRIPTION);
        $this->assertEquals(
            Currency::EUR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testXAG(): void
    {
        $this->fakeReference = Currency::XAG(static::DESCRIPTION);
        $this->assertEquals(
            Currency::XAG(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUSD(): void
    {
        $this->fakeReference = Currency::USD(static::DESCRIPTION);
        $this->assertEquals(
            Currency::USD(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUAH(): void
    {
        $this->fakeReference = Currency::UAH(static::DESCRIPTION);
        $this->assertEquals(
            Currency::UAH(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGEL(): void
    {
        $this->fakeReference = Currency::GEL(static::DESCRIPTION);
        $this->assertEquals(
            Currency::GEL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBYN(): void
    {
        $this->fakeReference = Currency::BYN(static::DESCRIPTION);
        $this->assertEquals(
            Currency::BYN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRUB(): void
    {
        $this->fakeReference = Currency::RUB(static::DESCRIPTION);
        $this->assertEquals(
            Currency::RUB(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
