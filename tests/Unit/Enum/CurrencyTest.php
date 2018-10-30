<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Currency;

/**
 * Class CurrencyTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class CurrencyTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Currency::UAH(), new Currency(Currency::UAH));
        $this->assertEquals(Currency::BYN(), new Currency(Currency::BYN));
        $this->assertEquals(Currency::CHF(), new Currency(Currency::CHF));
        $this->assertEquals(Currency::EUR(), new Currency(Currency::EUR));
        $this->assertEquals(Currency::GBP(), new Currency(Currency::GBP));
        $this->assertEquals(Currency::GEL(), new Currency(Currency::GEL));
        $this->assertEquals(Currency::PLN(), new Currency(Currency::PLN));
        $this->assertEquals(Currency::RUB(), new Currency(Currency::RUB));
        $this->assertEquals(Currency::USD(), new Currency(Currency::USD));
        $this->assertEquals(Currency::XAG(), new Currency(Currency::XAG));
        $this->assertEquals(Currency::XAU(), new Currency(Currency::XAU));
    }
}
