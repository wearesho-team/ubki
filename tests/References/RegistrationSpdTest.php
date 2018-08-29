<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\RegistrationSpd;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class RegistrationSpdTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass RegistrationSpd
 * @internal
 */
class RegistrationSpdTest extends ReferenceTestCase
{
    public function testPhysical(): void
    {
        $this->fakeReference = RegistrationSpd::PHYSICAL(static::DESCRIPTION);
        $this->assertEquals(
            RegistrationSpd::PHYSICAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBusiness(): void
    {
        $this->fakeReference = RegistrationSpd::BUSINESS(static::DESCRIPTION);
        $this->assertEquals(
            RegistrationSpd::BUSINESS(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
