<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Gender;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class GenderTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass Gender
 * @internal
 */
class GenderTest extends ReferenceTestCase
{
    public function testWoman(): void
    {
        $this->fakeReference = Gender::WOMAN(static::DESCRIPTION);
        $this->assertEquals(
            Gender::WOMAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testMan(): void
    {
        $this->fakeReference = Gender::MAN(static::DESCRIPTION);
        $this->assertEquals(
            Gender::MAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
