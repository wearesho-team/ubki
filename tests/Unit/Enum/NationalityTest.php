<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Nationality;

/**
 * Class NationalityTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\Nationality
 * @internal
 */
class NationalityTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Nationality::ARMENIA(), new Nationality(Nationality::ARMENIA));
        $this->assertEquals(Nationality::BELARUS(), new Nationality(Nationality::BELARUS));
        $this->assertEquals(Nationality::AZERBAIJAN(), new Nationality(Nationality::AZERBAIJAN));
        $this->assertEquals(Nationality::GEORGIA(), new Nationality(Nationality::GEORGIA));
        $this->assertEquals(Nationality::GERMANY(), new Nationality(Nationality::GERMANY));
        $this->assertEquals(Nationality::ISRAEL(), new Nationality(Nationality::ISRAEL));
        $this->assertEquals(Nationality::KAZAKHSTAN(), new Nationality(Nationality::KAZAKHSTAN));
        $this->assertEquals(Nationality::POLAND(), new Nationality(Nationality::POLAND));
        $this->assertEquals(Nationality::RUSSIAN_FEDERATION(), new Nationality(Nationality::RUSSIAN_FEDERATION));
        $this->assertEquals(Nationality::STATELESS(), new Nationality(Nationality::STATELESS));
        $this->assertEquals(Nationality::TURKEY(), new Nationality(Nationality::TURKEY));
        $this->assertEquals(Nationality::UKRAINE(), new Nationality(Nationality::UKRAINE));
        $this->assertEquals(Nationality::USA(), new Nationality(Nationality::USA));
        $this->assertEquals(Nationality::UZBEKISTAN(), new Nationality(Nationality::UZBEKISTAN));
    }
}
