<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\RegistrationSpd;

use PHPUnit\Framework\TestCase;

/**
 * Class RegistrationSpdTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class RegistrationSpdTest extends TestCase
{

    public function testBusiness()
    {
        $description = 'физическое лицо - субъект предпринимательской деятельности';
        $registration = RegistrationSpd::BUSINESS($description);
        $this->assertEquals(RegistrationSpd::BUSINESS, $registration->getValue());
        $this->assertEquals('BUSINESS', $registration->getKey());
        $this->assertEquals($description, $registration->getDescription());
    }

    public function testPhysical()
    {
        $description = 'физическое лицо';
        $registration = RegistrationSpd::PHYSICAL($description);
        $this->assertEquals(RegistrationSpd::PHYSICAL, $registration->getValue());
        $this->assertEquals('PHYSICAL', $registration->getKey());
        $this->assertEquals($description, $registration->getDescription());
    }
}
